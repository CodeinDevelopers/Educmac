<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_book_issues extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'book_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'date_of_issue' => [
				'type' => 'DATE',
			],
			'date_of_expiry' => [
				'type' => 'DATE',
			],
			'return_date' => [
				'type' => 'DATE',
			],
			'fine_amount' => [
				'type' => 'DECIMAL',
				'constraint' => '18, 2',
				'null' => FALSE,
			],
			'status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'issued_by' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'return_by' => [
				'type' => 'INT',
				'constraint' => '11',
			],
			'session_id' => [
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
		$this->dbforge->add_key('book_id');
		$this->dbforge->add_key('session_id');

		// Create table
		$this->dbforge->create_table('book_issues', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `book_issues` ADD CONSTRAINT `book_issues_rms1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `book_issues` ADD CONSTRAINT `book_issues_rms2` '
			. 'FOREIGN KEY (`book_id`) '
			. 'REFERENCES `book` (`id`)'
		);
		$this->db->query(
			'ALTER TABLE `book_issues` ADD CONSTRAINT `book_issues_rms3` '
			. 'FOREIGN KEY (`session_id`) '
			. 'REFERENCES `schoolyear` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('book_issues', TRUE);
	}
}
