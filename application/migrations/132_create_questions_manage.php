<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_questions_manage extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'question_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'onlineexam_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'marks' => [
				'type' => 'FLOAT',
				'constraint' => '10, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'neg_marks' => [
				'type' => 'FLOAT',
				'constraint' => '10, 2',
				'default' => 0.00,
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

		// Add indexes
		$this->dbforge->add_key('onlineexam_id');
		$this->dbforge->add_key('question_id');

		// Create table
		$this->dbforge->create_table('questions_manage', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('questions_manage', TRUE);
	}
}
