<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_saas_subscriptions extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'package_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'school_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'expire_date' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'upgrade_lasttime' => [
				'type' => 'DATE',
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('saas_subscriptions', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('saas_subscriptions', TRUE);
	}
}
