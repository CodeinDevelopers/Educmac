<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_leave_category extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '2',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'name' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'role_id' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'days' => [
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

		// Create table
		$this->dbforge->create_table('leave_category', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('leave_category', TRUE);
	}
}
