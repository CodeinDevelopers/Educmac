<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_online_exam extends CI_Migration {

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
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'class_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'section_id' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'subject_id' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'limits_participation' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'exam_start' => [
				'type' => 'DATETIME',
			],
			'exam_end' => [
				'type' => 'DATETIME',
			],
			'duration' => [
				'type' => 'TIME',
				'null' => FALSE,
			],
			'mark_type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'passing_mark' => [
				'type' => 'FLOAT',
				'null' => FALSE,
				'default' => 0,
			],
			'instruction' => [
				'type' => 'TEXT',
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'publish_result' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'marks_display' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'neg_mark' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'question_type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'publish_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'exam_type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'fee' => [
				'type' => 'FLOAT',
				'null' => FALSE,
				'default' => 0,
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'position_generated' => [
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
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('session_id');

		// Create table
		$this->dbforge->create_table('online_exam', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('online_exam', TRUE);
	}
}
