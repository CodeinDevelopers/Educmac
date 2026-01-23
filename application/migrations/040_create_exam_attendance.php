<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_exam_attendance extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'student_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'exam_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'subject_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '4',
			],
			'remark' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
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
		$this->dbforge->add_key('exam_id');
		$this->dbforge->add_key('student_id');

		// Create table
		$this->dbforge->create_table('exam_attendance', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `exam_attendance` ADD CONSTRAINT `exam_attendance_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `exam_attendance` ADD CONSTRAINT `exam_attendance_rms_2` '
			. 'FOREIGN KEY (`exam_id`) '
			. 'REFERENCES `exam` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `exam_attendance` ADD CONSTRAINT `exam_attendance_rms_3` '
			. 'FOREIGN KEY (`student_id`) '
			. 'REFERENCES `student` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('exam_attendance', TRUE);
	}
}
