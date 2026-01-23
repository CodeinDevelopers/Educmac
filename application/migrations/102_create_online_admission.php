<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_online_admission extends CI_Migration {

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
			'first_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'last_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'gender' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
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
			'mobile_no' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'mother_tongue' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'present_address' => [
				'type' => 'TEXT',
			],
			'permanent_address' => [
				'type' => 'TEXT',
			],
			'admission_date' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'city' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'state' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'student_photo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'category_id' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'previous_school_details' => [
				'type' => 'TEXT',
			],
			'guardian_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'guardian_relation' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'father_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'mother_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'grd_occupation' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'grd_income' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
			],
			'grd_education' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'grd_email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'grd_mobile_no' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'grd_address' => [
				'type' => 'TEXT',
			],
			'grd_city' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'grd_state' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'grd_photo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
				'default' => 1,
			],
			'payment_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'payment_amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'payment_details' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'class_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'section_id' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
			],
			'apply_date' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
			'doc' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_date' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('online_admission', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `online_admission` ADD CONSTRAINT `online_admission_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('online_admission', TRUE);
	}
}
