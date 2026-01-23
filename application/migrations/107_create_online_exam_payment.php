<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_online_exam_payment extends CI_Migration {

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
			'exam_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'payment_method' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
			],
			'amount' => [
				'type' => 'FLOAT',
				'null' => FALSE,
				'default' => 0,
			],
			'transaction_id' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
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
		$this->dbforge->create_table('online_exam_payment', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('online_exam_payment', TRUE);
	}
}
