<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_staff extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'staff_id' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'department' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'qualification' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'experience_details' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'total_experience' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'designation' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'joining_date' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'birthday' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'sex' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'religion' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'blood_group' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'present_address' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'permanent_address' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'mobileno' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'salary_template_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'default' => 0,
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
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('staff', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('staff', TRUE);
	}
}
