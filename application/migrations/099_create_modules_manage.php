<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_modules_manage extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'modules_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'isEnabled' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('id');

		// Create table
		$this->dbforge->create_table('modules_manage', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('modules_manage', TRUE);
	}
}
