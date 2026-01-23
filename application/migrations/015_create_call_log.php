<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_call_log extends CI_Migration {

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
			'number' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'purpose_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'call_type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'start_time' => [
				'type' => 'TIME',
			],
			'end_time' => [
				'type' => 'TIME',
			],
			'follow_up' => [
				'type' => 'DATE',
			],
			'note' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_by' => [
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

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('call_log', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `call_log` ADD CONSTRAINT `call_log_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('call_log', TRUE);
	}
}
