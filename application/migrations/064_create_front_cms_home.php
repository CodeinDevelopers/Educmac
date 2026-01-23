<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_home extends CI_Migration {

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
			'subtitle' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'item_type' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'description' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'elements' => [
				'type' => 'MEDIUMTEXT',
				'null' => FALSE,
			],
			'color1' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'color2' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'active' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
				'default' => 1,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('front_cms_home', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_home', TRUE);
	}
}
