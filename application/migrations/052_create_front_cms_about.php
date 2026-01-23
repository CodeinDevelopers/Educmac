<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_about extends CI_Migration {

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
			'page_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'content' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'banner_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'about_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'elements' => [
				'type' => 'MEDIUMTEXT',
				'null' => FALSE,
			],
			'meta_description' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'meta_keyword' => [
				'type' => 'TEXT',
				'null' => FALSE,
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
		$this->dbforge->create_table('front_cms_about', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_about', TRUE);
	}
}
