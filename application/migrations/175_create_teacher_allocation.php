<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_teacher_allocation extends CI_Migration {

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
			'teacher_id' => [
				'type' => 'INT',
				'constraint' => '11',
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

		// Create table
		$this->dbforge->create_table('teacher_allocation', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('teacher_allocation', TRUE);
	}
}
