<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_payment_config extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => '11',
				'auto_increment' => TRUE,
				'null' => FALSE,
			],
			'paypal_username' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paypal_password' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paypal_signature' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paypal_email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paypal_sandbox' => [
				'type' => 'TINYINT',
				'constraint' => '4',
			],
			'paypal_status' => [
				'type' => 'TINYINT',
				'constraint' => '4',
			],
			'stripe_secret' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'stripe_publishiable' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'stripe_demo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'stripe_status' => [
				'type' => 'TINYINT',
				'constraint' => '4',
			],
			'payumoney_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'payumoney_salt' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'payumoney_demo' => [
				'type' => 'TINYINT',
				'constraint' => '4',
			],
			'payumoney_status' => [
				'type' => 'TINYINT',
				'constraint' => '4',
			],
			'paystack_secret_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'paystack_status' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
			],
			'razorpay_key_id' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'razorpay_key_secret' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'razorpay_demo' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
			],
			'razorpay_status' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
			],
			'sslcz_store_id' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'sslcz_store_passwd' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'sslcommerz_sandbox' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'sslcommerz_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'jazzcash_merchant_id' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'jazzcash_passwd' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'jazzcash_integerity_salt' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'jazzcash_sandbox' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'jazzcash_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'midtrans_client_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'midtrans_server_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => FALSE,
			],
			'midtrans_sandbox' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'midtrans_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
			],
			'flutterwave_public_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'flutterwave_secret_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'flutterwave_sandbox' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'flutterwave_status' => [
				'type' => 'TINYINT',
				'constraint' => '4',
				'null' => FALSE,
				'default' => 0,
			],
			'paytm_merchantmid' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paytm_merchantkey' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paytm_merchant_website' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paytm_industry_type' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'paytm_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'toyyibpay_secretkey' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'toyyibpay_categorycode' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'toyyibpay_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'payhere_merchant_id' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'payhere_merchant_secret' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'payhere_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'nepalste_public_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'nepalste_secret_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'nepalste_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'bkash_app_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'bkash_app_secret' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'bkash_username' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'bkash_password' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'bkash_sandbox' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
			],
			'bkash_status' => [
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => FALSE,
				'default' => 0,
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
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		// Add primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table
		$this->dbforge->create_table('payment_config', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('payment_config', TRUE);
	}
}
