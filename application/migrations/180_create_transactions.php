<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transactions extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'account_id' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'voucher_head_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'category' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'ref' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'dr' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'cr' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'bal' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'pay_via' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'description' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'attachments' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'system' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
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

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('transactions', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `transactions` ADD CONSTRAINT `transactions_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('transactions', TRUE);
	}
}
