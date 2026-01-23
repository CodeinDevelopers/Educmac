<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_advance_salary extends CI_Migration {

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
			'amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'deduct_month' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'year' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'reason' => [
				'type' => 'TEXT',
			],
			'request_date' => [
				'type' => 'DATETIME',
			],
			'paid_date' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'create_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'issued_by' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'comments' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'default' => 0,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('staff_id');

		// Create table
		$this->dbforge->create_table('advance_salary', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `advance_salary` ADD CONSTRAINT `advance_salary_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `advance_salary` ADD CONSTRAINT `advance_salary_rms_2` '
			. 'FOREIGN KEY (`staff_id`) '
			. 'REFERENCES `staff` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('advance_salary', TRUE);
	}
}
