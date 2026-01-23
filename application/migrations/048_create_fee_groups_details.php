<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_fee_groups_details extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'fee_groups_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'fee_type_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'due_date' => [
				'type' => 'DATE',
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('fee_groups_id');
		$this->dbforge->add_key('fee_type_id');

		// Create table
		$this->dbforge->create_table('fee_groups_details', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `fee_groups_details` ADD CONSTRAINT `fee_groups_details_rms_1` '
			. 'FOREIGN KEY (`fee_groups_id`) '
			. 'REFERENCES `fee_groups` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `fee_groups_details` ADD CONSTRAINT `fee_groups_details_rms_2` '
			. 'FOREIGN KEY (`fee_type_id`) '
			. 'REFERENCES `fees_type` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('fee_groups_details', TRUE);
	}
}
