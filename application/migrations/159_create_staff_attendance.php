<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_staff_attendance extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'staff_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
			],
			'remark' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'qr_code' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'in_time' => [
				'type' => 'TIME',
			],
			'out_time' => [
				'type' => 'TIME',
			],
			'date' => [
				'type' => 'DATE',
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
		$this->dbforge->add_key('staff_id');

		// Create table
		$this->dbforge->create_table('staff_attendance', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `staff_attendance` ADD CONSTRAINT `staff_attendance_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `staff_attendance` ADD CONSTRAINT `staff_attendance_rms_2` '
			. 'FOREIGN KEY (`staff_id`) '
			. 'REFERENCES `staff` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('staff_attendance', TRUE);
	}
}
