<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_promotion_history extends CI_Migration {

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
			'pre_class' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'pre_section' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'pre_session' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'pro_class' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'pro_section' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'pro_session' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'prev_due' => [
				'type' => 'FLOAT',
				'null' => FALSE,
				'default' => 0,
			],
			'is_leave' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'date' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('student_id');

		// Create table
		$this->dbforge->create_table('promotion_history', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `promotion_history` ADD CONSTRAINT `promotion_history_rms_1` '
			. 'FOREIGN KEY (`student_id`) '
			. 'REFERENCES `student` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('promotion_history', TRUE);
	}
}
