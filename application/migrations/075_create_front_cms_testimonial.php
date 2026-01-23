<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_testimonial extends CI_Migration {

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
				'constraint' => '255',
				'null' => FALSE,
			],
			'surname' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
				'null' => FALSE,
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'description' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'rank' => [
				'type' => 'INT',
				'constraint' => '5',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_by' => [
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
		$this->dbforge->create_table('front_cms_testimonial', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_testimonial', TRUE);
	}
}
