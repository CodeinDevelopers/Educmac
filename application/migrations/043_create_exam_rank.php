<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_exam_rank extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'exam_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'enroll_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'principal_comments' => [
				'type' => 'TEXT',
			],
			'teacher_comments' => [
				'type' => 'TEXT',
			],
			'rank' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 0,
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
		$this->dbforge->add_key('exam_id');
		$this->dbforge->add_key('enroll_id');

		// Create table
		$this->dbforge->create_table('exam_rank', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `exam_rank` ADD CONSTRAINT `exam_rank_rms_1` '
			. 'FOREIGN KEY (`enroll_id`) '
			. 'REFERENCES `enroll` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `exam_rank` ADD CONSTRAINT `exam_rank_rms_2` '
			. 'FOREIGN KEY (`exam_id`) '
			. 'REFERENCES `exam` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('exam_rank', TRUE);
	}
}
