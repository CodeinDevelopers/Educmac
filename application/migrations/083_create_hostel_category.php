<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_hostel_category extends CI_Migration {

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
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'description' => [
				'type' => 'LONGTEXT',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'type' => [
				'type' => 'TEXT',
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
		$this->dbforge->create_table('hostel_category', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('hostel_category', TRUE);
	}
}
