<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_student_admission_fields extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'fields_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'required' => [
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
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('student_admission_fields', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('student_admission_fields', TRUE);
	}
}
