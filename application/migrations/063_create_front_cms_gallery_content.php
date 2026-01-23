<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_gallery_content extends CI_Migration {

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
				'null' => FALSE,
			],
			'alias' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'thumb_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'category_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'added_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'file_type' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'elements' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'show_web' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('front_cms_gallery_content', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_gallery_content', TRUE);
	}
}
