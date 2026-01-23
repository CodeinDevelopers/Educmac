<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_live_class_config extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'zoom_api_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'zoom_api_secret' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'bbb_salt_key' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'bbb_server_base_url' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'staff_api_credential' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'student_api_credential' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
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
		$this->dbforge->create_table('live_class_config', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('live_class_config', TRUE);
	}
}
