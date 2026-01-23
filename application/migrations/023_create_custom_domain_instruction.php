<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_custom_domain_instruction extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'instruction' => [
				'type' => 'TEXT',
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'default' => 0,
			],
			'dns_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'dns_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'dns_type_1' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'dns_host_1' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'dns_value_1' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'dns_type_2' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'dns_host_2' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'dns_value_2' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
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
		$this->dbforge->create_table('custom_domain_instruction', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('custom_domain_instruction', TRUE);
	}
}
