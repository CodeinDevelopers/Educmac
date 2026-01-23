<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_attachments extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'remarks' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'type_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'uploader_id' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'class_id' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'default' => 'unfiltered',
			],
			'file_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'enc_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'subject_id' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'default' => 'unfiltered',
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
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
		$this->dbforge->add_key('session_id');
		$this->dbforge->add_key('branch_id');

		// Create table
		$this->dbforge->create_table('attachments', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `attachments` ADD CONSTRAINT `attachments_rms_1` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `attachments` ADD CONSTRAINT `attachments_rms_2` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('attachments', TRUE);
	}
}
