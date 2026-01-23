<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_transport_fee_details extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'month' => [
				'type' => 'VARCHAR',
				'constraint' => '2',
			],
			'transport_fee_fine_id' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'enroll_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'stoppage_point_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('stoppage_point_id');
		$this->dbforge->add_key('enroll_id');

		// Create table
		$this->dbforge->create_table('transport_fee_details', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `transport_fee_details` ADD CONSTRAINT `transport_fee_details_rms_2` '
			. 'FOREIGN KEY (`enroll_id`) '
			. 'REFERENCES `enroll` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('transport_fee_details', TRUE);
	}
}
