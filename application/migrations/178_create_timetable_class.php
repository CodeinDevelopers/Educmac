<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_timetable_class extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
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
			'break' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
				'default' => 'false',
			],
			'subject_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'teacher_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'class_room' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'time_start' => [
				'type' => 'TIME',
				'null' => FALSE,
			],
			'time_end' => [
				'type' => 'TIME',
				'null' => FALSE,
			],
			'day' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('class_id');
		$this->dbforge->add_key('section_id');
		$this->dbforge->add_key('session_id');

		// Create table
		$this->dbforge->create_table('timetable_class', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `timetable_class` ADD CONSTRAINT `timetable_class_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `timetable_class` ADD CONSTRAINT `timetable_class_rms_2` '
			. 'FOREIGN KEY (`class_id`) '
			. 'REFERENCES `class` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `timetable_class` ADD CONSTRAINT `timetable_class_rms_3` '
			. 'FOREIGN KEY (`section_id`) '
			. 'REFERENCES `section` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `timetable_class` ADD CONSTRAINT `timetable_class_rms_4` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('timetable_class', TRUE);
	}
}
