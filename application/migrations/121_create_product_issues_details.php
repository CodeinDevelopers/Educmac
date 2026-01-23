<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_product_issues_details extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'issues_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'product_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'quantity' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('product_id');

		// Create table
		$this->dbforge->create_table('product_issues_details', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `product_issues_details` ADD CONSTRAINT `product_issues_details_rms_1` '
			. 'FOREIGN KEY (`product_id`) '
			. 'REFERENCES `product` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('product_issues_details', TRUE);
	}
}
