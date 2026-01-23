<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_permission_modules extends CI_Migration {

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
				'null' => FALSE,
			],
			'system' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'sorted' => [
				'type' => 'TINYINT',
				'constraint' => '10',
				'null' => FALSE,
			],
			'in_module' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('id');

		// Create table
		$this->dbforge->create_table('permission_modules', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('permission_modules', TRUE);
	}
}
