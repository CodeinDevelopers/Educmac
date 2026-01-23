<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transport_route extends CI_Migration {

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
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'start_place' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'remarks' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'stop_place' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('transport_route', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `transport_route` ADD CONSTRAINT `transport_route_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('transport_route', TRUE);
	}
}
