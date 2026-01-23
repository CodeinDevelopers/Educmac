<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_permission extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'module_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'prefix' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'show_view' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'default' => 1,
			],
			'show_add' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'default' => 1,
			],
			'show_edit' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'default' => 1,
			],
			'show_delete' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'default' => 1,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('permission', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('permission', TRUE);
	}
}
