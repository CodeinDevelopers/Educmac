<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Migration Controller: Populate Terms for Existing Sessions
 *
 * This controller creates academic terms for all existing sessions.
 * Access via: yoursite.com/migrate_terms/populate
 */
class Migrate_terms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Only allow superadmin access
        if (!is_superadmin_loggedin()) {
            show_error('Access Denied: Only superadmin can run this migration.', 403, 'Access Denied');
        }
    }

    /**
     * Main migration method
     */
    public function populate()
    {
        // Set time limit
        set_time_limit(300);

        echo "<html><head><title>Terms Migration</title>";
        echo "<style>
            body { font-family: monospace; padding: 20px; background: #f5f5f5; }
            .container { background: white; padding: 20px; border-radius: 5px; max-width: 900px; margin: 0 auto; }
            h1 { color: #333; border-bottom: 2px solid #2196F3; padding-bottom: 10px; }
            h2 { color: #2196F3; margin-top: 30px; }
            .success { color: #4CAF50; }
            .error { color: #f44336; }
            .warning { color: #FF9800; }
            .info { color: #2196F3; }
            pre { background: #f5f5f5; padding: 10px; border-left: 3px solid #2196F3; }
            .stats { background: #E3F2FD; padding: 15px; margin: 20px 0; border-radius: 5px; }
        </style></head><body><div class='container'>";

        echo "<h1>Academic Terms Population Script</h1>";

        // Check if academic_terms table exists
        if (!$this->db->table_exists('academic_terms')) {
            echo "<p class='error'>ERROR: academic_terms table does not exist!</p>";
            echo "<p>Please run the migration first: application/migrations/196_create_academic_terms.php</p>";
            echo "</div></body></html>";
            return;
        }

        // Get all sessions
        $sessions = $this->db->order_by('school_year', 'ASC')->get('schoolyear')->result();

        if (empty($sessions)) {
            echo "<p class='warning'>No sessions found in the database.</p>";
            echo "</div></body></html>";
            return;
        }

        echo "<p class='info'>Found <strong>" . count($sessions) . "</strong> session(s) in the database.</p>";

        // Get all branches
        $branches = array();
        if ($this->db->table_exists('branch')) {
            $branch_query = $this->db->select('id, name')->where('status', 1)->get('branch');
            if ($branch_query && $branch_query->num_rows() > 0) {
                $branches = $branch_query->result_array();
            }
        }

        if (empty($branches)) {
            echo "<p class='warning'>No active branches found. Using default branch (ID: 1).</p>";
            $branches = array(array('id' => 1, 'name' => 'Main Branch'));
        }

        echo "<p class='info'>Found <strong>" . count($branches) . "</strong> active branch(es).</p>";

        // Statistics
        $stats = array(
            'sessions_processed' => 0,
            'sessions_skipped' => 0,
            'terms_created' => 0,
            'errors' => 0
        );

        echo "<h2>Processing Sessions</h2>";

        // Process each session
        foreach ($sessions as $session) {
            echo "<h3>Session: " . $session->school_year . " (ID: " . $session->id . ")</h3>";

            // Parse session year
            $years = array();
            if (strpos($session->school_year, '/') !== false) {
                $years = explode('/', $session->school_year);
            } elseif (strpos($session->school_year, '-') !== false) {
                $years = explode('-', $session->school_year);
            }

            if (count($years) != 2) {
                echo "<p class='warning'>Invalid session format. Expected YYYY/YYYY or YYYY-YYYY. Skipping.</p>";
                $stats['sessions_skipped']++;
                continue;
            }

            $start_year = trim($years[0]);
            $end_year = trim($years[1]);

            // Validate years
            if (!is_numeric($start_year) || !is_numeric($end_year)) {
                echo "<p class='warning'>Invalid year values. Skipping.</p>";
                $stats['sessions_skipped']++;
                continue;
            }

            // Process each branch
            foreach ($branches as $branch) {
                $branch_id = $branch['id'];
                $branch_name = isset($branch['name']) ? $branch['name'] : 'Branch ' . $branch_id;

                echo "<p><strong>Branch:</strong> " . $branch_name . " (ID: " . $branch_id . ")</p>";

                // Check if terms already exist
                $existing_terms_query = $this->db
                    ->where('session_id', $session->id)
                    ->where('branch_id', $branch_id)
                    ->get('academic_terms');

                if ($existing_terms_query && $existing_terms_query->num_rows() > 0) {
                    echo "<p class='info'>Terms already exist (" . $existing_terms_query->num_rows() . " terms). Skipping.</p>";
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
                echo "<ul>";
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

                    $this->db->insert('academic_terms', $term_data);
                    if ($this->db->affected_rows() > 0) {
                        echo "<li class='success'>✓ Created: " . $term['term_name'] . "</li>";
                        $created_count++;
                        $stats['terms_created']++;
                    } else {
                        echo "<li class='error'>✗ Error creating " . $term['term_name'] . "</li>";
                        $stats['errors']++;
                    }
                }
                echo "</ul>";
                echo "<p class='success'>Created " . $created_count . " terms for this branch.</p>";
            }

            $stats['sessions_processed']++;
        }

        // Auto-activate current term for current session
        echo "<h2>Activating Current Term</h2>";

        $current_date = date('Y-m-d');
        $current_year = date('Y');
        $current_month = date('n');

        // Determine current session
        if ($current_month >= 9) {
            $current_session_name = $current_year . '/' . ($current_year + 1);
        } else {
            $current_session_name = ($current_year - 1) . '/' . $current_year;
        }

        echo "<p class='info'>Current date: " . $current_date . "</p>";
        echo "<p class='info'>Looking for session: " . $current_session_name . "</p>";

        $current_session = $this->db->where('school_year', $current_session_name)->get('schoolyear')->row();

        if ($current_session) {
            echo "<p class='success'>Found current session: " . $current_session->school_year . " (ID: " . $current_session->id . ")</p>";

            foreach ($branches as $branch) {
                $branch_id = $branch['id'];
                $branch_name = isset($branch['name']) ? $branch['name'] : 'Branch ' . $branch_id;

                echo "<p><strong>Branch:</strong> " . $branch_name . " (ID: " . $branch_id . ")</p>";

                // Find term by date range
                $active_term = $this->db
                    ->where('session_id', $current_session->id)
                    ->where('branch_id', $branch_id)
                    ->where('start_date <=', $current_date)
                    ->where('end_date >=', $current_date)
                    ->get('academic_terms')
                    ->row();

                if ($active_term) {
                    // Deactivate all terms for this session/branch
                    $this->db
                        ->where('session_id', $current_session->id)
                        ->where('branch_id', $branch_id)
                        ->update('academic_terms', array('is_active' => 0));

                    // Activate the current term
                    $this->db
                        ->where('id', $active_term->id)
                        ->update('academic_terms', array(
                            'is_active' => 1,
                            'updated_at' => date('Y-m-d H:i:s')
                        ));

                    echo "<p class='success'>✓ Activated: " . $active_term->term_name . "</p>";
                } else {
                    // No term matches current date, activate first term
                    $first_term = $this->db
                        ->where('session_id', $current_session->id)
                        ->where('branch_id', $branch_id)
                        ->order_by('term_order', 'ASC')
                        ->limit(1)
                        ->get('academic_terms')
                        ->row();

                    if ($first_term) {
                        // Deactivate all terms
                        $this->db
                            ->where('session_id', $current_session->id)
                            ->where('branch_id', $branch_id)
                            ->update('academic_terms', array('is_active' => 0));

                        // Activate first term
                        $this->db
                            ->where('id', $first_term->id)
                            ->update('academic_terms', array(
                                'is_active' => 1,
                                'updated_at' => date('Y-m-d H:i:s')
                            ));

                        echo "<p class='success'>✓ Activated (fallback): " . $first_term->term_name . "</p>";
                    } else {
                        echo "<p class='error'>✗ No terms found for this branch</p>";
                    }
                }
            }
        } else {
            echo "<p class='warning'>Current session (" . $current_session_name . ") not found in database.</p>";
        }

        // Display summary
        echo "<h2>Summary</h2>";
        echo "<div class='stats'>";
        echo "<p><strong>Sessions processed:</strong> " . $stats['sessions_processed'] . "</p>";
        echo "<p><strong>Sessions skipped:</strong> " . $stats['sessions_skipped'] . "</p>";
        echo "<p><strong>Terms created:</strong> " . $stats['terms_created'] . "</p>";
        echo "<p><strong>Errors:</strong> " . $stats['errors'] . "</p>";
        echo "</div>";

        if ($stats['errors'] > 0) {
            echo "<p class='warning'>⚠ Completed with errors. Please review the output above.</p>";
        } else {
            echo "<p class='success' style='font-size: 18px;'><strong>✓ Migration completed successfully!</strong></p>";
        }

        echo "<p><a href='" . base_url('sessions') . "' class='btn btn-primary' style='display: inline-block; padding: 10px 20px; background: #2196F3; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px;'>Go to Sessions Page</a></p>";

        echo "</div></body></html>";
    }
}
