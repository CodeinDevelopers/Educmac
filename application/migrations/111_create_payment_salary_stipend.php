<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_payment_salary_stipend extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'payslip_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'name' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'amount' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('payment_salary_stipend', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('payment_salary_stipend', TRUE);
	}
}
