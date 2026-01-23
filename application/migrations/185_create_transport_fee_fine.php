<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transport_fee_fine extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'month' => [
				'type' => 'VARCHAR',
				'constraint' => '2',
				'null' => FALSE,
			],
			'due_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'fine_value' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'fine_type' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'fee_frequency' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('month');
		$this->dbforge->add_key('session_id');
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('transport_fee_fine', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('transport_fee_fine', TRUE);
	}
}
