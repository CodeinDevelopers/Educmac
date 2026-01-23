<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_homework_evaluation extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'homework_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'student_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'remark' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'rank' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('homework_id');

		// Create table
		$this->dbforge->create_table('homework_evaluation', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `homework_evaluation` ADD CONSTRAINT `homework_evaluation_rms_1` '
			. 'FOREIGN KEY (`homework_id`) '
			. 'REFERENCES `homework` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('homework_evaluation', TRUE);
	}
}
