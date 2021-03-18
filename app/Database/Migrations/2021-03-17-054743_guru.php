<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guru extends Migration
{
	public function up()
	{
		//Tabel guru
		$this->forge->addField([
			'nip' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'email_guru' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'nama_guru' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'jenis_kelamin' => [
				'type' => 'ENUM',
				'constraint' => "'L','P'",
				'default' => "L"
			],
			'tempat_lahir' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'tanggal_lahir' => [
				'type' => 'DATE'
			],
			'nuptk' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'status_kepegawaian' => [
				'type' => 'ENUM',
				'constraint' => "'PNS','Non-PNS'"
			],
			'guru_jurusan' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'mapel1' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
				'NULL' => true
			],
			'mapel2' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
				'NULL' => true
			],
			'mapel3' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
				'NULL' => true
			],
			'kecamatan' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'no_hp' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
			],
			'sk_cpns' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
			],
			'npwp' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
			],
			'nik' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
			],
		]);

		//Primary key
		$this->forge->addKey('nip', TRUE);
		$this->forge->addUniqueKey('email_guru');
		$this->forge->addUniqueKey('nuptk');
		$this->forge->addUniqueKey('sk_cpns');
		$this->forge->addUniqueKey('npwp');
		$this->forge->addUniqueKey('nik');


		//Membuat tabel guru
		$this->forge->createTable('guru', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//Hapus tabel
		$this->forge->dropTable('guru');
	}
}
