<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_qr_code_settings extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'confirmation_popup' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'auto_late_detect' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'camera' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
				'default' => 'environment',
			],
			'staff_in_time' => [
				'type' => 'TIME',
			],
			'staff_out_time' => [
				'type' => 'TIME',
			],
			'student_in_time' => [
				'type' => 'TIME',
			],
			'student_out_time' => [
				'type' => 'TIME',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
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
		$this->dbforge->create_table('qr_code_settings', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('qr_code_settings', TRUE);
	}
}
