<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_fee_groups extends CI_Migration {

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
				'constraint' => '255',
			],
			'description' => [
				'type' => 'TEXT',
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'system' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('session_id');

		// Create table
		$this->dbforge->create_table('fee_groups', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `fee_groups` ADD CONSTRAINT `fee_groups_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `fee_groups` ADD CONSTRAINT `fee_groups_rms_2` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('fee_groups', TRUE);
	}
}
