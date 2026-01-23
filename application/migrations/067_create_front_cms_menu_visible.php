<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_menu_visible extends CI_Migration {

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
				'constraint' => '100',
			],
			'menu_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'parent_id' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
			],
			'ordering' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'invisible' => [
				'type' => 'TINYINT',
				'constraint' => '2',
				'null' => FALSE,
				'default' => 1,
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
		$this->dbforge->create_table('front_cms_menu_visible', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_menu_visible', TRUE);
	}
}
