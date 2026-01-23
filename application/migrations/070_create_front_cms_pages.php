<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_pages extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'page_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'content' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'menu_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'banner_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
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
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('front_cms_pages', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_pages', TRUE);
	}
}
