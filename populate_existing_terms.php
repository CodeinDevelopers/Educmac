<?php
/**
 * Data Migration Script: Populate Terms for Existing Sessions
 *
 * This script creates academic terms for all existing sessions that don't have terms yet.
 * Run this once after deploying the new academic terms system.
 *
 * Usage: php populate_existing_terms.php
 */

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define constants
define('BASEPATH', dirname(__FILE__));
define('ENVIRONMENT', 'development');

// Load CodeIgniter
require_once dirname(__FILE__) . '/index.php';

// Get CodeIgniter instance
$CI =& get_instance();

echo "=======================================================\n";
echo "Academic Terms Population Script\n";
echo "=======================================================\n\n";

// Check if academic_terms table exists
if (!$CI->db->table_exists('academic_terms')) {
    echo "ERROR: academic_terms table does not exist!\n";
    echo "Please run the migration first: application/migrations/196_create_academic_terms.php\n";
    exit(1);
}

// Get all sessions
$sessions = $CI->db->order_by('school_year', 'ASC')->get('schoolyear')->result();

if (empty($sessions)) {
    echo "No sessions found in the database.\n";
    exit(0);
}

echo "Found " . count($sessions) . " session(s) in the database.\n\n";

// Get all branches
$branches = array();
if ($CI->db->table_exists('branch')) {
    $branch_query = $CI->db->select('id, name')->where('status', 1)->get('branch');
    if ($branch_query && $branch_query->num_rows() > 0) {
        $branches = $branch_query->result_array();
    }
}

if (empty($branches)) {
    echo "No active branches found. Using default branch (ID: 1).\n";
    $branches = array(array('id' => 1, 'name' => 'Main Branch'));
}

echo "Found " . count($branches) . " active branch(es).\n\n";

// Statistics
$stats = array(
    'sessions_processed' => 0,
    'sessions_skipped' => 0,
    'terms_created' => 0,
    'errors' => 0
);

// Process each session
foreach ($sessions as $session) {
    echo "Processing Session: " . $session->school_year . " (ID: " . $session->id . ")\n";

    // Parse session year
    $years = array();
    if (strpos($session->school_year, '/') !== false) {
        $years = explode('/', $session->school_year);
    } elseif (strpos($session->school_year, '-') !== false) {
        $years = explode('-', $session->school_year);
    }

    if (count($years) != 2) {
        echo "  WARNING: Invalid session format. Expected YYYY/YYYY or YYYY-YYYY. Skipping.\n";
        $stats['sessions_skipped']++;
        continue;
    }

    $start_year = trim($years[0]);
    $end_year = trim($years[1]);

    // Validate years
    if (!is_numeric($start_year) || !is_numeric($end_year)) {
        echo "  WARNING: Invalid year values. Skipping.\n";
        $stats['sessions_skipped']++;
        continue;
    }

    // Process each branch
    foreach ($branches as $branch) {
        $branch_id = $branch['id'];
        $branch_name = isset($branch['name']) ? $branch['name'] : 'Branch ' . $branch_id;

        echo "  Branch: " . $branch_name . " (ID: " . $branch_id . ")\n";

        // Check if terms already exist
        $existing_terms_query = $CI->db
            ->where('session_id', $session->id)
            ->where('branch_id', $branch_id)
            ->get('academic_terms');

        if ($existing_terms_query && $existing_terms_query->num_rows() > 0) {
            echo "    Terms already exist (" . $existing_terms_query->num_rows() . " terms). Skipping.\n";
            continue;
        }

        // Create 3 terms for Nigerian academic calendar
        $terms = array(
            array(
                'term_name' => 'First Term',
                'term_order' => 1,
                'start_date' => $start_year . '-09-01',
                'end_date' => $start_year . '-12-15',
                'total_weeks' => 15
            ),
            array(
                'term_name' => 'Second Term',
                'term_order' => 2,
                'start_date' => $end_year . '-01-15',
                'end_date' => $end_year . '-04-15',
                'total_weeks' => 13
            ),
            array(
                'term_name' => 'Third Term',
                'term_order' => 3,
                'start_date' => $end_year . '-05-01',
                'end_date' => $end_year . '-08-15',
                'total_weeks' => 15
            )
        );

        $created_count = 0;
        foreach ($terms as $term) {
            $term_data = array(
                'session_id' => $session->id,
                'branch_id' => $branch_id,
                'term_name' => $term['term_name'],
                'term_order' => $term['term_order'],
                'start_date' => $term['start_date'],
                'end_date' => $term['end_date'],
                'is_active' => 0,
                'total_weeks' => $term['total_weeks'],
                'holidays' => NULL,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => NULL
            );

            try {
                $CI->db->insert('academic_terms', $term_data);
                echo "    ✓ Created: " . $term['term_name'] . "\n";
                $created_count++;
                $stats['terms_created']++;
            } catch (Exception $e) {
                echo "    ✗ Error creating " . $term['term_name'] . ": " . $e->getMessage() . "\n";
                $stats['errors']++;
            }
        }

        echo "    Created " . $created_count . " terms for this branch.\n";
    }

    $stats['sessions_processed']++;
    echo "\n";
}

// Auto-activate current term for current session
echo "=======================================================\n";
echo "Activating Current Term\n";
echo "=======================================================\n\n";

$current_date = date('Y-m-d');
$current_year = date('Y');
$current_month = date('n');

// Determine current session
if ($current_month >= 9) {
    $current_session_name = $current_year . '/' . ($current_year + 1);
} else {
    $current_session_name = ($current_year - 1) . '/' . $current_year;
}

echo "Current date: " . $current_date . "\n";
echo "Looking for session: " . $current_session_name . "\n\n";

$current_session = $CI->db->where('school_year', $current_session_name)->get('schoolyear')->row();

if ($current_session) {
    echo "Found current session: " . $current_session->school_year . " (ID: " . $current_session->id . ")\n";

    foreach ($branches as $branch) {
        $branch_id = $branch['id'];
        $branch_name = isset($branch['name']) ? $branch['name'] : 'Branch ' . $branch_id;

        echo "  Branch: " . $branch_name . " (ID: " . $branch_id . ")\n";

        // Find term by date range
        $active_term = $CI->db
            ->where('session_id', $current_session->id)
            ->where('branch_id', $branch_id)
            ->where('start_date <=', $current_date)
            ->where('end_date >=', $current_date)
            ->get('academic_terms')
            ->row();

        if ($active_term) {
            // Deactivate all terms for this session/branch
            $CI->db
                ->where('session_id', $current_session->id)
                ->where('branch_id', $branch_id)
                ->update('academic_terms', array('is_active' => 0));

            // Activate the current term
            $CI->db
                ->where('id', $active_term->id)
                ->update('academic_terms', array(
                    'is_active' => 1,
                    'updated_at' => date('Y-m-d H:i:s')
                ));

            echo "    ✓ Activated: " . $active_term->term_name . "\n";
        } else {
            // No term matches current date, activate first term
            $first_term = $CI->db
                ->where('session_id', $current_session->id)
                ->where('branch_id', $branch_id)
                ->order_by('term_order', 'ASC')
                ->limit(1)
                ->get('academic_terms')
                ->row();

            if ($first_term) {
                // Deactivate all terms
                $CI->db
                    ->where('session_id', $current_session->id)
                    ->where('branch_id', $branch_id)
                    ->update('academic_terms', array('is_active' => 0));

                // Activate first term
                $CI->db
                    ->where('id', $first_term->id)
                    ->update('academic_terms', array(
                        'is_active' => 1,
                        'updated_at' => date('Y-m-d H:i:s')
                    ));

                echo "    ✓ Activated (fallback): " . $first_term->term_name . "\n";
            } else {
                echo "    ✗ No terms found for this branch\n";
            }
        }
    }
} else {
    echo "Current session (" . $current_session_name . ") not found in database.\n";
}

// Display summary
echo "\n=======================================================\n";
echo "Summary\n";
echo "=======================================================\n";
echo "Sessions processed: " . $stats['sessions_processed'] . "\n";
echo "Sessions skipped: " . $stats['sessions_skipped'] . "\n";
echo "Terms created: " . $stats['terms_created'] . "\n";
echo "Errors: " . $stats['errors'] . "\n";
echo "\n";

if ($stats['errors'] > 0) {
    echo "⚠ Completed with errors. Please review the output above.\n";
    exit(1);
} else {
    echo "✓ Migration completed successfully!\n";
    exit(0);
}
