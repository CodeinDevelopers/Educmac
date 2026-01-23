<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_email_templates_details extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'template_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'subject' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'template_body' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'notified' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('email_templates_details', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('email_templates_details', TRUE);
	}
}
