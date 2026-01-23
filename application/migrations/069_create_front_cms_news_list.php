<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_news_list extends CI_Migration {

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
			],
			'description' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'alias' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
				'null' => FALSE,
			],
			'date' => [
				'type' => 'DATE',
				'null' => FALSE,
			],
			'show_web' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'branch_id' => [
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

		// Create table
		$this->dbforge->create_table('front_cms_news_list', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `front_cms_news_list` ADD CONSTRAINT `front_cms_news_list_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_news_list', TRUE);
	}
}
