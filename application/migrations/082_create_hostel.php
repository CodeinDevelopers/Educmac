<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_hostel extends CI_Migration {

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
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'category_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'address' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'watchman' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'remarks' => [
				'type' => 'LONGTEXT',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'default' => 0,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('hostel', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `hostel` ADD CONSTRAINT `hostel_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('hostel', TRUE);
	}
}
