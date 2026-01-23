<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_timetable_exam extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'exam_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'class_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'section_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'subject_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'time_start' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'time_end' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'mark_distribution' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'hall_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'exam_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
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
		$this->dbforge->add_key('class_id');
		$this->dbforge->add_key('section_id');
		$this->dbforge->add_key('session_id');
		$this->dbforge->add_key('subject_id');

		// Create table
		$this->dbforge->create_table('timetable_exam', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `timetable_exam` ADD CONSTRAINT `timetable_exam_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `timetable_exam` ADD CONSTRAINT `timetable_exam_rms_2` '
			. 'FOREIGN KEY (`exam_id`) '
			. 'REFERENCES `exam` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `timetable_exam` ADD CONSTRAINT `timetable_exam_rms_3` '
			. 'FOREIGN KEY (`class_id`) '
			. 'REFERENCES `class` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `timetable_exam` ADD CONSTRAINT `timetable_exam_rms_4` '
			. 'FOREIGN KEY (`section_id`) '
			. 'REFERENCES `section` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `timetable_exam` ADD CONSTRAINT `timetable_exam_rms_5` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `timetable_exam` ADD CONSTRAINT `timetable_exam_rms_6` '
			. 'FOREIGN KEY (`subject_id`) '
			. 'REFERENCES `subject` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('timetable_exam', TRUE);
	}
}
