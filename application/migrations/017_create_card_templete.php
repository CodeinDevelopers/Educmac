<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_card_templete extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'card_type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'user_type' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'background' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'logo' => [
				'type' => 'VARCHAR',
				'constraint' => '355',
			],
			'signature' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'content' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'layout_width' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 54,
			],
			'layout_height' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 86,
			],
			'photo_style' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'photo_size' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
			],
			'top_space' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
			],
			'bottom_space' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
			],
			'right_space' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
			],
			'left_space' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => FALSE,
			],
			'qr_code' => [
				'type' => 'VARCHAR',
				'constraint' => '25',
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
		$this->dbforge->create_table('card_templete', TRUE);

		// Add foreign key constraints
		$this->db->query(
			'ALTER TABLE `card_templete` ADD CONSTRAINT `card_templete_rms_1` '
			. 'FOREIGN KEY (`branch_id`) '
			. 'REFERENCES `branch` (`id`)'
		);
	}

	public function down() {
		$this->dbforge->drop_table('card_templete', TRUE);
	}
}
