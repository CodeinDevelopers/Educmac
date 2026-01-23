<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_global_settings extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'institute_name' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'institution_code' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'reg_prefix' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'institute_email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'address' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'mobileno' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'currency' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'currency_symbol' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'currency_formats' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'symbol_position' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 1,
			],
			'sms_service_provider' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'session_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'translation' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'footer_text' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'animations' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'timezone' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'date_format' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'facebook_url' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'twitter_url' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'linkedin_url' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'youtube_url' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'cron_secret_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'preloader_backend' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'footer_branch_switcher' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'cms_default_branch' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
			'cache_store' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'image_extension' => [
				'type' => 'TEXT',
			],
			'image_size' => [
				'type' => 'FLOAT',
				'null' => FALSE,
				'default' => 1024,
			],
			'file_extension' => [
				'type' => 'TEXT',
			],
			'pid' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'file_size' => [
				'type' => 'FLOAT',
				'default' => 1024,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('global_settings', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('global_settings', TRUE);
	}
}
