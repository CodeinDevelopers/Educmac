<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_exam_hall extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'hall_no' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'seats' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('exam_hall', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `exam_hall` ADD CONSTRAINT `exam_hall_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('exam_hall', TRUE);
	}
}
