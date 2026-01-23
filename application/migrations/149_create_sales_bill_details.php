<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_sales_bill_details extends CI_Migration {

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
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'product_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'unit_price' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'quantity' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'discount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'sub_total' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('product_id');

		// Create table
		$this->dbforge->create_table('sales_bill_details', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `sales_bill_details` ADD CONSTRAINT `sales_bill_details_rms_1` '
			. 'FOREIGN KEY (`product_id`) '
			. 'REFERENCES `product` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('sales_bill_details', TRUE);
	}
}
