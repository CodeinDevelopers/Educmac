<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_fee_allocation extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'student_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'group_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'prev_due' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('student_id');
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('session_id');

		// Create table
		$this->dbforge->create_table('fee_allocation', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `fee_allocation` ADD CONSTRAINT `fee_allocation_rsm_1` '
			. 'FOREIGN KEY (`student_id`) '
			. 'REFERENCES `enroll` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `fee_allocation` ADD CONSTRAINT `fee_allocation_rsm_2` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `fee_allocation` ADD CONSTRAINT `fee_allocation_rsm_3` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('fee_allocation', TRUE);
	}
}
