<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_student_documents extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'student_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'remarks' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'enc_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('student_documents', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('student_documents', TRUE);
	}
}
