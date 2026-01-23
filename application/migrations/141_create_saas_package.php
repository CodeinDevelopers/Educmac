<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_saas_package extends CI_Migration {

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
			'price' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'discount' => [
				'type' => 'FLOAT',
				'null' => FALSE,
				'default' => 0,
			],
			'student_limit' => [
				'type' => 'FLOAT',
				'null' => FALSE,
			],
			'staff_limit' => [
				'type' => 'FLOAT',
				'null' => FALSE,
			],
			'teacher_limit' => [
				'type' => 'FLOAT',
				'null' => FALSE,
			],
			'parents_limit' => [
				'type' => 'FLOAT',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'show_onwebsite' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'period_type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'period_value' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'free_trial' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'permission' => [
				'type' => 'LONGTEXT',
			],
			'recommended' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('saas_package', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('saas_package', TRUE);
	}
}
