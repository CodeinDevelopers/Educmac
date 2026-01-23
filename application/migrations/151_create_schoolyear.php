<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_schoolyear extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'school_year' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'created_by' => [
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

		// Create table
		$this->dbforge->create_table('schoolyear', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('schoolyear', TRUE);
	}
}
