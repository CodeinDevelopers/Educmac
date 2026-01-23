<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_student_subject_attendance extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'enroll_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'subject_timetable_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'date' => [
				'type' => 'DATE',
			],
			'remark' => [
				'type' => 'TEXT',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('status');
		$this->dbforge->add_key('enroll_id');
		$this->dbforge->add_key('subject_timetable_id');
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('student_subject_attendance', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `student_subject_attendance` ADD CONSTRAINT `student_subject_attendance_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `student_subject_attendance` ADD CONSTRAINT `student_subject_attendance_rms_2` '
			. 'FOREIGN KEY (`enroll_id`) '
			. 'REFERENCES `enroll` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('student_subject_attendance', TRUE);
	}
}
