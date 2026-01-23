<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_online_exam_answer extends CI_Migration {

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
			'online_exam_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'question_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'answer' => [
				'type' => 'LONGTEXT',
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
		$this->dbforge->create_table('online_exam_answer', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('online_exam_answer', TRUE);
	}
}
