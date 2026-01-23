<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_whatsapp_agent extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'agent_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'agent_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'agent_designation' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'whataspp_number' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'start_time' => [
				'type' => 'TIME',
				'null' => FALSE,
			],
			'end_time' => [
				'type' => 'TIME',
				'null' => FALSE,
			],
			'weekend' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'enable' => [
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
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('whatsapp_agent', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('whatsapp_agent', TRUE);
	}
}
