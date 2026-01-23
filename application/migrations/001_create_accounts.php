<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_accounts extends CI_Migration {

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
			'number' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'description' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'balance' => [
				'type' => 'DOUBLE',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
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
		$this->dbforge->create_table('accounts', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `accounts` ADD CONSTRAINT `accounts_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('accounts', TRUE);
	}
}
