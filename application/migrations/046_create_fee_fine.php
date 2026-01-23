<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_fee_fine extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'group_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'type_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'fine_value' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'fine_type' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'fee_frequency' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
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
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('group_id');
		$this->dbforge->add_key('session_id');
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('fee_fine', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `fee_fine` ADD CONSTRAINT `fee_fine_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `fee_fine` ADD CONSTRAINT `fee_fine_rms_2` '
			. 'FOREIGN KEY (`group_id`) '
			. 'REFERENCES `fee_groups` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `fee_fine` ADD CONSTRAINT `fee_fine_rms_3` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `fee_fine` ADD CONSTRAINT `fee_fine_rms_4` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('fee_fine', TRUE);
	}
}
