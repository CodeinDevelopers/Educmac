<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_reset_password extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'key' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'login_credential_id' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Create table
		$this->dbforge->create_table('reset_password', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('reset_password', TRUE);
	}
}
