<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_online_exam_attempts extends CI_Migration {

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
			'online_exam_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'count' => [
				'type' => 'FLOAT',
				'null' => FALSE,
				'default' => 0,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('online_exam_attempts', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('online_exam_attempts', TRUE);
	}
}
