<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_saas_offline_payments extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'payment_type' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'school_register_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'payment_date' => [
				'type' => 'DATE',
			],
			'reference' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'amount' => [
				'type' => 'FLOAT',
				'constraint' => '10, 2',
			],
			'submit_date' => [
				'type' => 'DATETIME',
			],
			'approve_date' => [
				'type' => 'DATETIME',
			],
			'orig_file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'enc_file_name' => [
				'type' => 'TEXT',
			],
			'note' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'comments' => [
				'type' => 'TEXT',
			],
			'approved_by' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('saas_offline_payments', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('saas_offline_payments', TRUE);
	}
}
