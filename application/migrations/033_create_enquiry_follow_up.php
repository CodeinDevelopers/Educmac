<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_enquiry_follow_up extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'enquiry_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'next_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'response' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'note' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'follow_up_by' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('enquiry_id');

		// Create table
		$this->dbforge->create_table('enquiry_follow_up', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `enquiry_follow_up` ADD CONSTRAINT `enquiry_follow_up_rms_1` '
			. 'FOREIGN KEY (`enquiry_id`) '
			. 'REFERENCES `enquiry` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('enquiry_follow_up', TRUE);
	}
}
