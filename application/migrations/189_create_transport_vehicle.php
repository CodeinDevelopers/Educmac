<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transport_vehicle extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'vehicle_no' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'capacity' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'insurance_renewal' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'driver_name' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'driver_phone' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'driver_license' => [
				'type' => 'LONGTEXT',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('transport_vehicle', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `transport_vehicle` ADD CONSTRAINT `transport_vehicle_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('transport_vehicle', TRUE);
	}
}
