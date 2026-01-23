<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_grade extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'grade_point' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'lower_mark' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'upper_mark' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'remark' => [
				'type' => 'TEXT',
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
		$this->dbforge->create_table('grade', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `grade` ADD CONSTRAINT `grade_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('grade', TRUE);
	}
}
