<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_live_class_reports extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'live_class_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'student_id' => [
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

		// Create table
		$this->dbforge->create_table('live_class_reports', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('live_class_reports', TRUE);
	}
}
