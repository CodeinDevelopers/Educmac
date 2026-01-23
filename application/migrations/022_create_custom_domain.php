<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_custom_domain extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'school_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'url' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'approved_date' => [
				'type' => 'DATETIME',
			],
			'request_date' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'domain_type' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'comments' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('custom_domain', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('custom_domain', TRUE);
	}
}
