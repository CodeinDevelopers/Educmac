<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_whatsapp_chat extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'header_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'subtitle' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'footer_text' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'popup_message' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'frontend_enable_chat' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'backend_enable_chat' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
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
		$this->dbforge->create_table('whatsapp_chat', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('whatsapp_chat', TRUE);
	}
}
