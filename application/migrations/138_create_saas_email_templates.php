<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_saas_email_templates extends CI_Migration {

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
			'subject' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'template_body' => [
				'type' => 'TEXT',
			],
			'notified' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'tags' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('saas_email_templates', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('saas_email_templates', TRUE);
	}
}
