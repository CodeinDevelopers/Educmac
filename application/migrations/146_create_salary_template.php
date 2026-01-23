<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_salary_template extends CI_Migration {

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
			'basic_salary' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'overtime_salary' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => 0,
			],
			'branch_id' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('salary_template', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('salary_template', TRUE);
	}
}
