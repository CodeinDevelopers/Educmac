<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transactions_links_details extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'payment_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'transactions_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('transactions_links_details', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('transactions_links_details', TRUE);
	}
}
