<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transactions_links extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '3',
			],
			'deposit' => [
				'type' => 'TINYINT',
				'constraint' => '3',
			],
			'expense' => [
				'type' => 'TINYINT',
				'constraint' => '3',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('transactions_links', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `transactions_links` ADD CONSTRAINT `transactions_links_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('transactions_links', TRUE);
	}
}
