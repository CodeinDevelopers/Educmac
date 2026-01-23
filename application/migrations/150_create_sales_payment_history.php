<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_sales_payment_history extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'sales_bill_id' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
				'null' => FALSE,
			],
			'payment_by' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'pay_via' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
			],
			'remarks' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'attach_orig_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'attach_file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paid_on' => [
				'type' => 'DATE',
			],
			'coll_type' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('sales_payment_history', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('sales_payment_history', TRUE);
	}
}
