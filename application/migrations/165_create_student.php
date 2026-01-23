<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_student extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'register_no' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'admission_date' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'first_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'last_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'gender' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'birthday' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'religion' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'caste' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'blood_group' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'mother_tongue' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'current_address' => [
				'type' => 'TEXT',
			],
			'permanent_address' => [
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
			'mobileno' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'category_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'parent_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'route_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'stoppage_point_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'vehicle_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'hostel_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'room_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'previous_details' => [
				'type' => 'TEXT',
			],
			'photo' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'active' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
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
		$this->dbforge->create_table('student', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('student', TRUE);
	}
}
