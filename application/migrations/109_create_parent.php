<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_parent extends CI_Migration {

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
			],
			'relation' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'father_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'mother_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'occupation' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'income' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'education' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'mobileno' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'address' => [
				'type' => 'TEXT',
			],
			'city' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'state' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'photo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'facebook_url' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'linkedin_url' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'twitter_url' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
			'active' => [
				'type' => 'TINYINT',
				'constraint' => '2',
				'null' => FALSE,
				'default' => 0,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('parent', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('parent', TRUE);
	}
}
