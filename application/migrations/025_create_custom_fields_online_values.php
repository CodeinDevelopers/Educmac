<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_custom_fields_online_values extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'relid' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'field_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'value' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('relid');
		$this->dbforge->add_key('field_id');

		// Create table
		$this->dbforge->create_table('custom_fields_online_values', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('custom_fields_online_values', TRUE);
	}
}
