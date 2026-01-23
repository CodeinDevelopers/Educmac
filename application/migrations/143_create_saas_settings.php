<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_saas_settings extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'expired_alert' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'expired_alert_days' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE,
				'default' => 7,
			],
			'expired_alert_message' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
			],
			'expired_message' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
			],
			'slider_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'slider_description' => [
				'type' => 'VARCHAR',
				'constraint' => '900',
			],
			'slider_bg_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'slider_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'terms_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'agree_checkbox_text' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'terms_and_conditions' => [
				'type' => 'TEXT',
				'null' => FALSE,
			],
			'overly_image_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 1,
			],
			'overly_image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'automatic_approval' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'captcha_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'recaptcha_site_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'recaptcha_secret_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'offline_payments' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'pwa_enable' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'button_text_1' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'button_url_1' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'button_text_2' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'button_url_2' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'feature_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'feature_description' => [
				'type' => 'VARCHAR',
				'constraint' => '900',
			],
			'price_plan_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'price_plan_description' => [
				'type' => 'VARCHAR',
				'constraint' => '900',
			],
			'price_plan_button' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'faq_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'faq_description' => [
				'type' => 'VARCHAR',
				'constraint' => '900',
			],
			'contact_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'receive_contact_email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'contact_description' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'contact_button' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'footer_about' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
			],
			'payment_logo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'primary_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
				'default' => '#ff6b81',
			],
			'menu_bg_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
				'default' => '#ff6b81',
			],
			'menu_text_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'default' => '#fff',
			],
			'heading_text_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
				'default' => '#081828',
			],
			'footer_bg_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
				'default' => '#081828',
			],
			'footer_text_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
				'default' => '#D2D6DC',
			],
			'copyright_bg_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
				'default' => '#1e1e1e',
			],
			'copyright_text_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
				'default' => '#888',
			],
			'text_color' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
				'default' => '#888',
			],
			'seo_title' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'seo_keyword' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
			],
			'seo_description' => [
				'type' => 'TEXT',
			],
			'google_analytics' => [
				'type' => 'VARCHAR',
				'constraint' => '500',
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => FALSE,
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('saas_settings', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('saas_settings', TRUE);
	}
}
