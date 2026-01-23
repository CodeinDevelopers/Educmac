<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_questions extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'level' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'class_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'section_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'default' => 0,
			],
			'subject_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
			],
			'group_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'question' => [
				'type' => 'LONGTEXT',
			],
			'opt_1' => [
				'type' => 'LONGTEXT',
			],
			'opt_2' => [
				'type' => 'LONGTEXT',
			],
			'opt_3' => [
				'type' => 'LONGTEXT',
			],
			'opt_4' => [
				'type' => 'LONGTEXT',
			],
			'answer' => [
				'type' => 'TEXT',
			],
			'mark' => [
				'type' => 'FLOAT',
				'constraint' => '10, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATE',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('questions', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('questions', TRUE);
	}
}
