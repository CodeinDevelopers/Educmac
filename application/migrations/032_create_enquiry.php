<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_enquiry extends CI_Migration {

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
			'birthday' => [
				'type' => 'DATE',
			],
			'gender' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'default' => 0,
			],
			'father_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'mother_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'mobile_no' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'address' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'previous_school' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'reference_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'response_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'response' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'note' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'assigned_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'no_of_child' => [
				'type' => 'FLOAT',
				'null' => FALSE,
			],
			'class_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
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
			'updated_at' => [
				'type' => 'DATE',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('enquiry', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `enquiry` ADD CONSTRAINT `enquiry_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('enquiry', TRUE);
	}
}
