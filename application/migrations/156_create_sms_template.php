<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_sms_template extends CI_Migration {

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
			'tags' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('sms_template', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('sms_template', TRUE);
	}
}
