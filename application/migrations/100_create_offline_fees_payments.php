<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_offline_fees_payments extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'payment_method' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'invoice_no' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'student_enroll_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'fees_allocation_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'fees_type_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'transport_fee_details_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'payment_date' => [
				'type' => 'DATE',
			],
			'reference' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'amount' => [
				'type' => 'FLOAT',
				'constraint' => '10, 2',
			],
			'fine' => [
				'type' => 'FLOAT',
				'constraint' => '10, 2',
			],
			'submit_date' => [
				'type' => 'DATETIME',
			],
			'approve_date' => [
				'type' => 'DATETIME',
			],
			'orig_file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'enc_file_name' => [
				'type' => 'TEXT',
			],
			'note' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'comments' => [
				'type' => 'TEXT',
			],
			'approved_by' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('fees_allocation_id');
		$this->dbforge->add_key('fees_type_id');
		$this->dbforge->add_key('approved_by');
		$this->dbforge->add_key('student_enroll_id');

		// Create table
		$this->dbforge->create_table('offline_fees_payments', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('offline_fees_payments', TRUE);
	}
}
