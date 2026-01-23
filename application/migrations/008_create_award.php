<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_award extends CI_Migration {

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
				'null' => FALSE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'gift_item' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'award_amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'award_reason' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'given_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('session_id');

		// Create table
		$this->dbforge->create_table('award', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `award` ADD CONSTRAINT `award_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `award` ADD CONSTRAINT `award_rms_2` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('award', TRUE);
	}
}
