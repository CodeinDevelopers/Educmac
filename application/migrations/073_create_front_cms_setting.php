<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_front_cms_setting extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'application_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'url_alias' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'cms_active' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'online_admission' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'theme' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'captcha_status' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE,
			],
			'recaptcha_site_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'recaptcha_secret_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => '350',
				'null' => FALSE,
			],
			'mobile_no' => [
				'type' => 'VARCHAR',
				'constraint' => '60',
				'null' => FALSE,
			],
			'fax' => [
				'type' => 'VARCHAR',
				'constraint' => '60',
				'null' => FALSE,
			],
			'receive_contact_email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '60',
				'null' => FALSE,
			],
			'copyright_text' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'fav_icon' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'logo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'footer_about_text' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
				'null' => FALSE,
			],
			'working_hours' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
				'null' => FALSE,
			],
			'google_analytics' => [
				'type' => 'TEXT',
			],
			'primary_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#ff685c',
			],
			'menu_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#fff',
			],
			'hover_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#f04133',
			],
			'text_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#232323',
			],
			'text_secondary_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#383838',
			],
			'footer_background_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#383838',
			],
			'footer_text_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#8d8d8d',
			],
			'copyright_bg_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#262626',
			],
			'copyright_text_color' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '#8d8d8d',
			],
			'border_radius' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => 0,
			],
			'facebook_url' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'twitter_url' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'youtube_url' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'google_plus' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'linkedin_url' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'pinterest_url' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'instagram_url' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			],
			'branch_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('front_cms_setting', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('front_cms_setting', TRUE);
	}
}
