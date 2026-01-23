<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_email_config extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'protocol' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'smtp_host' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'smtp_user' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'smtp_pass' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'smtp_port' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'smtp_encryption' => [
				'type' => 'VARCHAR',
				'constraint' => '10',
			],
			'smtp_auth' => [
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => FALSE,
				'default' => 'true',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('email_config', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('email_config', TRUE);
	}
}
