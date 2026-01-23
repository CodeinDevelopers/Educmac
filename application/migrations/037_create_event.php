<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_event extends CI_Migration {

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
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'remark' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'type' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'audition' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'selected_list' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'start_date' => [
				'type' => 'DATE',
			],
			'end_date' => [
				'type' => 'DATE',
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'created_by' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'show_web' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
				'default' => 1,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('session_id');

		// Create table
		$this->dbforge->create_table('event', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `event` ADD CONSTRAINT `event_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `event` ADD CONSTRAINT `event_rms_2` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('event', TRUE);
	}
}
