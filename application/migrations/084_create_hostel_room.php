<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_hostel_room extends CI_Migration {

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
			'hostel_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'no_beds' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'category_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'bed_fee' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'remarks' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('hostel_room', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('hostel_room', TRUE);
	}
}
