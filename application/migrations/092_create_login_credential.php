<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_login_credential extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '250',
				'null' => FALSE,
			],
			'role' => [
				'type' => 'TINYINT',
				'constraint' => '2',
				'null' => FALSE,
			],
			'active' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'last_login' => [
				'type' => 'DATETIME',
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('login_credential', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('login_credential', TRUE);
	}
}
