<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_subject extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'subject_code' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => FALSE,
			],
			'subject_type' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'subject_author' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
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
		$this->dbforge->create_table('subject', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('subject', TRUE);
	}
}
