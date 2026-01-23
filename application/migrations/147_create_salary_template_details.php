<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_salary_template_details extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'salary_template_id' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => FALSE,
			],
			'amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'type' => [
				'type' => 'TINYINT',
				'constraint' => '2',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('salary_template_details', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('salary_template_details', TRUE);
	}
}
