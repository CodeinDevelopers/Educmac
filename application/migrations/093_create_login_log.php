<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_login_log extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'role' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'ip' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'browser' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'platform' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'timestamp' => [
				'type' => 'TIMESTAMP',
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

		// Create table
		$this->dbforge->create_table('login_log', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `login_log` ADD CONSTRAINT `login_log_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('login_log', TRUE);
	}
}
