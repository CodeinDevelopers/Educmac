<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transport_assign extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'route_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'vehicle_id' => [
				'type' => 'INT',
				'constraint' => '11',
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

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('transport_assign', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `transport_assign` ADD CONSTRAINT `transport_assign_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('transport_assign', TRUE);
	}
}
