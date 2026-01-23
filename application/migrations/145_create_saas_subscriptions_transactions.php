<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_saas_subscriptions_transactions extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'subscriptions_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'package_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'payment_id' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'discount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
				'default' => 0.00,
			],
			'payment_method' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
			],
			'renew' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'purchase_date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'expire_date' => [
				'type' => 'DATE',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('saas_subscriptions_transactions', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('saas_subscriptions_transactions', TRUE);
	}
}
