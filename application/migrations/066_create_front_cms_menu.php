<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_menu extends CI_Migration {

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
				'constraint' => '100',
				'null' => FALSE,
			],
			'alias' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'ordering' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'parent_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'default' => 0,
			],
			'open_new_tab' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'ext_url' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
				'default' => 0,
			],
			'ext_url_address' => [
				'type' => 'TEXT',
			],
			'publish' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
			],
			'system' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('front_cms_menu', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_menu', TRUE);
	}
}
