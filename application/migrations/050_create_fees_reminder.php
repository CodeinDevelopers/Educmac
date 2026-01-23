<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_fees_reminder extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'frequency' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'days' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'message' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'dlt_template_id' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'student' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
			],
			'guardian' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
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

		// Create table
		$this->dbforge->create_table('fees_reminder', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `fees_reminder` ADD CONSTRAINT `fees_reminder_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('fees_reminder', TRUE);
	}
}
