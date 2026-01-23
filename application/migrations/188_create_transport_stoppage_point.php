<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transport_stoppage_point extends CI_Migration {

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
			'stoppage_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'route_fare' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
			],
			'stop_time' => [
				'type' => 'TIME',
			],
			'order_no' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'session_id' => [
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

		// Add indexes
		$this->dbforge->add_key('branch_id');
		$this->dbforge->add_key('route_id');
		$this->dbforge->add_key('session_id');

		// Create table
		$this->dbforge->create_table('transport_stoppage_point', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `transport_stoppage_point` ADD CONSTRAINT `transport_stoppage_point_rms_1` '
			. 'FOREIGN KEY (`route_id`) '
			. 'REFERENCES `transport_route` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `transport_stoppage_point` ADD CONSTRAINT `transport_stoppage_point_rms_2` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `transport_stoppage_point` ADD CONSTRAINT `transport_stoppage_point_rms_3` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('transport_stoppage_point', TRUE);
	}
}
