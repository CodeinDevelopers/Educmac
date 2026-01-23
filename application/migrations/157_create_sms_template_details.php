<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_sms_template_details extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'template_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'dlt_template_id' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'notify_student' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
				'default' => 1,
			],
			'notify_parent' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
				'default' => 1,
			],
			'template_body' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
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

		// Create table
		$this->dbforge->create_table('sms_template_details', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('sms_template_details', TRUE);
	}
}
