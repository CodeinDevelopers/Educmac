<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_marksheet_template extends CI_Migration {

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
			'background' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'logo' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'left_signature' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'middle_signature' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'right_signature' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'attendance_percentage' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'grading_scale' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'position' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'cumulative_average' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'class_average' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'result' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'subject_position' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'remark' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'header_content' => [
				'type' => 'TEXT',
			],
			'footer_content' => [
				'type' => 'TEXT',
			],
			'page_layout' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'photo_style' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'photo_size' => [
				'type' => 'FLOAT',
				'null' => FALSE,
				'default' => 120,
			],
			'top_space' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
				'default' => 0,
			],
			'bottom_space' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
				'default' => 0,
			],
			'right_space' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
				'default' => 0,
			],
			'left_space' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
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
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('marksheet_template', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `marksheet_template` ADD CONSTRAINT `marksheet_template_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('marksheet_template', TRUE);
	}
}
