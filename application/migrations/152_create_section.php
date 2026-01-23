<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_section extends CI_Migration {

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
			'capacity' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('section', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('section', TRUE);
	}
}
