<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_leave_application extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'category_id' => [
				'type' => 'INT',
				'constraint' => '2',
				'null' => FALSE,
			],
			'reason' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'start_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'end_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'leave_days' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
				'default' => 0,
			],
			'status' => [
				'type' => 'INT',
				'constraint' => '2',
				'null' => FALSE,
				'default' => 1,
			],
			'apply_date' => [
				'type' => 'DATE',
			],
			'approved_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'orig_file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'enc_file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'comments' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
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
		$this->dbforge->create_table('leave_application', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('leave_application', TRUE);
	}
}
