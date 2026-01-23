<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_contact extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'box_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'box_description' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
			],
			'box_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'form_title' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'submit_text' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
				'null' => FALSE,
			],
			'map_iframe' => [
				'type' => 'TEXT',
			],
			'page_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
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
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('front_cms_contact', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_contact', TRUE);
	}
}
