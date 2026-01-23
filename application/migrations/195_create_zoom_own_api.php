<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_zoom_own_api extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'user_type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'zoom_api_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'zoom_api_secret' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('zoom_own_api', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('zoom_own_api', TRUE);
	}
}
