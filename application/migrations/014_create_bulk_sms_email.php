<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_bulk_sms_email extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'campaign_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'sms_gateway' => [
				'type' => 'VARCHAR',
				'constraint' => '55',
				'default' => 0,
			],
			'message' => [
				'type' => 'TEXT',
			],
			'email_subject' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'message_type' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'default' => 0,
			],
			'recipient_type' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
			],
			'recipients_details' => [
				'type' => 'LONGTEXT',
			],
			'additional' => [
				'type' => 'LONGTEXT',
			],
			'schedule_time' => [
				'type' => 'DATETIME',
			],
			'posting_status' => [
				'type' => 'TINYINT',
				'constraint' => '3',
				'null' => FALSE,
			],
			'total_thread' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'successfully_sent' => [
				'type' => 'INT',
				'constraint' => '11',
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
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Add indexes
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('bulk_sms_email', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `bulk_sms_email` ADD CONSTRAINT `bulk_sms_email_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('bulk_sms_email', TRUE);
	}
}
