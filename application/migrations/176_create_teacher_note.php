<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_teacher_note extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'title' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'description' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'file_name' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'enc_name' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'type_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'class_id' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'teacher_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
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
		$this->dbforge->create_table('teacher_note', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('teacher_note', TRUE);
	}
}
