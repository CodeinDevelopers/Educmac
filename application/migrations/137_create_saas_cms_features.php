<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_saas_cms_features extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'description' => [
				'type' => 'TEXT',
			],
			'icon' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('saas_cms_features', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('saas_cms_features', TRUE);
	}
}
