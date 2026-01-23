<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_fee_payment_history extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'allocation_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'type_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'transport_fee_details_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'collect_by' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'discount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'fine' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'pay_via' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'remarks' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('allocation_id');
		$this->dbforge->add_key('type_id');

		// Create table
		$this->dbforge->create_table('fee_payment_history', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `fee_payment_history` ADD CONSTRAINT `fee_payment_history_rms_1` '
			. 'FOREIGN KEY (`allocation_id`) '
			. 'REFERENCES `fee_allocation` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `fee_payment_history` ADD CONSTRAINT `fee_payment_history_rms_2` '
			. 'FOREIGN KEY (`type_id`) '
			. 'REFERENCES `fees_type` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('fee_payment_history', TRUE);
	}
}
