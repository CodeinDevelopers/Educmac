<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_payslip extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'staff_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'month' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'year' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'basic_salary' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'total_allowance' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'total_deduction' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'net_salary' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'bill_no' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
			],
			'remarks' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'pay_via' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'hash' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'paid_by' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('payslip', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('payslip', TRUE);
	}
}
