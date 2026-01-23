<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_product_issues extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'date_of_issue' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'due_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'return_date' => [
				'type' => 'DATE',
			],
			'remarks' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'prepared_by' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
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
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('product_issues', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `product_issues` ADD CONSTRAINT `product_issues_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('product_issues', TRUE);
	}
}
