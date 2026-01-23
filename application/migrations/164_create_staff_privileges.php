<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_staff_privileges extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'permission_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'is_add' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'is_edit' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'is_view' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'is_delete' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('staff_privileges', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('staff_privileges', TRUE);
	}
}
