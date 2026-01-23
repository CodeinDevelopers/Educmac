<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_enroll extends CI_Migration {

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
			'roll' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'default_login' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'is_alumni' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
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
		$this->dbforge->add_key('student_id');
		$this->dbforge->add_key('session_id');
		$this->dbforge->add_key('class_id');
		$this->dbforge->add_key('section_id');
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('enroll', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `enroll` ADD CONSTRAINT `enroll_rms_1` '
			. 'FOREIGN KEY (`student_id`) '
			. 'REFERENCES `student` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `enroll` ADD CONSTRAINT `enroll_rms_2` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `enroll` ADD CONSTRAINT `enroll_rms_3` '
			. 'FOREIGN KEY (`class_id`) '
			. 'REFERENCES `class` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `enroll` ADD CONSTRAINT `enroll_rms_4` '
			. 'FOREIGN KEY (`section_id`) '
			. 'REFERENCES `section` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `enroll` ADD CONSTRAINT `enroll_rms_5` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('enroll', TRUE);
	}
}
