<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_rm_sessions extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => FALSE,
			],
			'ip_address' => [
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => FALSE,
			],
			'timestamp' => [
				'type' => 'INT',
				'constraint' => '10',
				'unsigned' => TRUE,
				'null' => FALSE,
				'default' => 0,
			],
			'data' => [
				'type' => 'BLOB',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('timestamp');

		// Create table
		$this->dbforge->create_table('rm_sessions', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('rm_sessions', TRUE);
	}
}
