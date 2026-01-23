<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_migrations extends CI_Migration {

	public function up() {
		// Define fields
		$this->dbforge->add_field([
			'version' => [
				'type' => 'BIGINT',
				'constraint' => '20',
				'null' => FALSE,
			],
		]);

		// Create table
		$this->dbforge->create_table('migrations', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('migrations', TRUE);
	}
}
