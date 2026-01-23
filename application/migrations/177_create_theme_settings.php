<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_theme_settings extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'border_mode' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => FALSE,
			],
			'dark_skin' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('theme_settings', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('theme_settings', TRUE);
	}
}
