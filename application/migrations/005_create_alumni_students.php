<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_alumni_students extends CI_Migration {

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
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'mobile_no' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
				'null' => FALSE,
			],
			'profession' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'photo' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('enroll_id');

		// Create table
		$this->dbforge->create_table('alumni_students', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `alumni_students` ADD CONSTRAINT `alumni_students_rms_1` '
			. 'FOREIGN KEY (`enroll_id`) '
			. 'REFERENCES `enroll` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('alumni_students', TRUE);
	}
}
