<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_disable_reason_details extends CI_Migration {

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
			'reason_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'note' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('disable_reason_details', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('disable_reason_details', TRUE);
	}
}
