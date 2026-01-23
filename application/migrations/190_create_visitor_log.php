<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_visitor_log extends CI_Migration {

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
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'entry_time' => [
				'type' => 'TIME',
			],
			'exit_time' => [
				'type' => 'TIME',
			],
			'number_of_visitor' => [
				'type' => 'FLOAT',
			],
			'id_number' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'token_pass' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
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
		$this->dbforge->create_table('visitor_log', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `visitor_log` ADD CONSTRAINT `visitor_log_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('visitor_log', TRUE);
	}
}
