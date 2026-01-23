<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transport_stoppage extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'stop_position' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'stop_time' => [
				'type' => 'TIME',
				'null' => FALSE,
			],
			'route_fare' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
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
		$this->dbforge->create_table('transport_stoppage', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `transport_stoppage` ADD CONSTRAINT `transport_stoppage_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('transport_stoppage', TRUE);
	}
}
