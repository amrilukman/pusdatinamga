<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		//Tabel user
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'nomor_induk' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
				'default' => md5('12345678')
			],
			'role' => [
				'type' => 'ENUM',
				'constraint' => "'operator','pimpinan','alumni','guru','siswa'"
			],
		]);

		//Primary key
		$this->forge->addKey('id', TRUE);
		$this->forge->addUniqueKey('email');
		$this->forge->addUniqueKey('nomor_induk');

		//Membuat tabel user
		$this->forge->createTable('user', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//Hapus tabel
		$this->forge->dropTable('user');
	}
}
