<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_roles extends CI_Migration {

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
				'constraint' => '50',
				'null' => FALSE,
			],
			'prefix' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'is_system' => [
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('roles', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('roles', TRUE);
	}
}
