<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_bulk_msg_category extends CI_Migration {

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
			'body' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'type' => [
				'type' => 'TINYINT',
				'constraint' => '4',
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
		$this->dbforge->create_table('bulk_msg_category', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `bulk_msg_category` ADD CONSTRAINT `bulk_msg_category_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('bulk_msg_category', TRUE);
	}
}
