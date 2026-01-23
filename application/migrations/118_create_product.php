<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_product extends CI_Migration {

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
				'constraint' => '100',
				'null' => FALSE,
			],
			'code' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => FALSE,
			],
			'category_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'purchase_unit_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'sales_unit_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'unit_ratio' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'default' => 1,
			],
			'purchase_price' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'sales_price' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'available_stock' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'photo' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'remarks' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('product', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `product` ADD CONSTRAINT `product_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('product', TRUE);
	}
}
