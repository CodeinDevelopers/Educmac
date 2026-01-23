<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_sms_credential extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'sms_api_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'field_one' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
				'null' => FALSE,
			],
			'field_two' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
				'null' => FALSE,
			],
			'field_three' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
				'null' => FALSE,
			],
			'field_four' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'is_active' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
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
		$this->dbforge->create_table('sms_credential', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('sms_credential', TRUE);
	}
}
