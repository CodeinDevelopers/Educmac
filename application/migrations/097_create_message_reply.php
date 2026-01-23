<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_message_reply extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'message_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'body' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'file_name' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'enc_name' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'identity' => [
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
		$this->dbforge->create_table('message_reply', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('message_reply', TRUE);
	}
}
