<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_homework_submit extends CI_Migration {

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
			'message' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
				'null' => FALSE,
			],
			'enc_name' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('homework_id');
		$this->dbforge->add_key('student_id');

		// Create table
		$this->dbforge->create_table('homework_submit', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `homework_submit` ADD CONSTRAINT `homework_submit_rms_1` '
			. 'FOREIGN KEY (`homework_id`) '
			. 'REFERENCES `homework` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `homework_submit` ADD CONSTRAINT `homework_submit_rms_2` '
			. 'FOREIGN KEY (`student_id`) '
			. 'REFERENCES `student` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('homework_submit', TRUE);
	}
}
