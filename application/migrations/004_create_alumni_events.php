<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_alumni_events extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'title' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'audience' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'selected_list' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'from_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'to_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'note' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'photo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'show_web' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
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
		$this->dbforge->add_key('session_id');
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('alumni_events', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `alumni_events` ADD CONSTRAINT `alumni_events_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('alumni_events', TRUE);
	}
}
