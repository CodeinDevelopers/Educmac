<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_addon extends CI_Migration {

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
			'prefix' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'version' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'purchase_code' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'items_code' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
			'last_update' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('addon', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('addon', TRUE);
	}
}
