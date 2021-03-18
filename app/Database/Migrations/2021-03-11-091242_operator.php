<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Operator extends Migration
{
	public function up()
	{
		//Tabel Operator
		$this->forge->addField([
			'id_operator' => [
				'type' => 'INT',
				'constraint' => 10,
				'auto_increment' => true
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'tempat_lahir' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'tanggal_lahir' => [
				'type' => 'DATA'
			],
			'jenis_kelamin' => [
				'type' => 'ENUM',
				'constraint' => "'L','P'"
			],
			'kecamatan' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'no_hp' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
		]);

		//Primary key
		$this->forge->addKey('id_operator', TRUE);

		//Membuat tabel operator
		$this->forge->createTable('operator', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//Hapus tabel
		$this->forge->dropTable('operator');
	}
}
