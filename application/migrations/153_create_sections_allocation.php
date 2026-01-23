<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_sections_allocation extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'class_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'section_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('class_id');
		$this->dbforge->add_key('section_id');

		// Create table
		$this->dbforge->create_table('sections_allocation', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `sections_allocation` ADD CONSTRAINT `sections_allocation_rms_1` '
			. 'FOREIGN KEY (`class_id`) '
			. 'REFERENCES `class` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `sections_allocation` ADD CONSTRAINT `sections_allocation_rms_2` '
			. 'FOREIGN KEY (`section_id`) '
			. 'REFERENCES `section` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('sections_allocation', TRUE);
	}
}
