<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_saas_school_register extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'reference_no' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'package_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'school_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'address' => [
				'type' => 'TEXT',
			],
			'logo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'admin_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'contact_number' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'gender' => [
				'type' => 'TINYINT',
				'constraint' => '1',
			],
			'message' => [
				'type' => 'TEXT',
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'payment_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'payment_amount' => [
				'type' => 'DOUBLE',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'payment_data' => [
				'type' => 'TEXT',
			],
			'date_of_approval' => [
				'type' => 'DATETIME',
			],
			'comments' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('saas_school_register', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('saas_school_register', TRUE);
	}
}
