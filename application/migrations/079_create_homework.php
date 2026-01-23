<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_homework extends CI_Migration {

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
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'subject_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'date_of_homework' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'date_of_submission' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'description' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'create_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => FALSE,
			],
			'sms_notification' => [
				'type' => 'TINYINT',
				'constraint' => '2',
				'null' => FALSE,
			],
			'schedule_date' => [
				'type' => 'DATE',
			],
			'document' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'evaluation_date' => [
				'type' => 'DATE',
			],
			'evaluated_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('class_id');
		$this->dbforge->add_key('section_id');
		$this->dbforge->add_key('session_id');
		$this->dbforge->add_key('subject_id');

		// Create table
		$this->dbforge->create_table('homework', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `homework` ADD CONSTRAINT `homework_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `homework` ADD CONSTRAINT `homework_rms_2` '
			. 'FOREIGN KEY (`class_id`) '
			. 'REFERENCES `class` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `homework` ADD CONSTRAINT `homework_rms_3` '
			. 'FOREIGN KEY (`section_id`) '
			. 'REFERENCES `section` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `homework` ADD CONSTRAINT `homework_rms_4` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `homework` ADD CONSTRAINT `homework_rms_5` '
			. 'FOREIGN KEY (`subject_id`) '
			. 'REFERENCES `subject` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('homework', TRUE);
	}
}
