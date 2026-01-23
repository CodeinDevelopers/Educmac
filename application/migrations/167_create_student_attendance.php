<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_student_attendance extends CI_Migration {

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
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '4',
			],
			'qr_code' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'remark' => [
				'type' => 'TEXT',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('enroll_id');

		// Create table
		$this->dbforge->create_table('student_attendance', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `student_attendance` ADD CONSTRAINT `student_attendance_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `student_attendance` ADD CONSTRAINT `student_attendance_rms_2` '
			. 'FOREIGN KEY (`enroll_id`) '
			. 'REFERENCES `enroll` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('student_attendance', TRUE);
	}
}
