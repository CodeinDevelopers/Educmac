<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_product_store extends CI_Migration {

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
			'code' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'mobileno' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('product_store', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('product_store', TRUE);
	}
}
