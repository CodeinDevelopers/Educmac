<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_postal_record extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'sender_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'receiver_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'reference_no' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'address' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'note' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'file' => [
				'type' => 'VARCHAR',
				'constraint' => '250',
				'null' => FALSE,
			],
			'confidential' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('postal_record', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('postal_record', TRUE);
	}
}
