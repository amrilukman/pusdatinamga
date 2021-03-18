<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pimpinan extends Migration
{
	public function up()
	{
		//Tabel pimpinan
		$this->forge->addField([
			'nip' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'email_pimpinan' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'nama_pimpinan' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'tempat_lahir' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'tanggal_lahir' => [
				'type' => 'DATE'
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
			]
		]);

		//Primary key
		$this->forge->addKey('nip', TRUE);
		$this->forge->addUniqueKey('email_pimpinan');

		//Membuat tabel pimpinan
		$this->forge->createTable('pimpinan', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//Hapus tabel
		$this->forge->dropTable('pimpinan');
	}
}
