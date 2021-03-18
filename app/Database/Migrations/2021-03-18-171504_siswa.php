<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
	public function up()
	{
		//Tabel guru
		$this->forge->addField([
			'nisn' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'email_siswa' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'nama_siswa' => [
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
			'kecamatan' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'penerima_kps' => [
				'type' => 'ENUM',
				'constraint' => "'Ya','Tidak'",
				'default' => 'Tidak'
			],
			'no_kip' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
				'NULL' => true
			],
			'no_rek' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
				'NULL' => true
			],
			'no_hp' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
			],
			'kelas' => [
				'type' => 'ENUM',
				'constraint' => "'1','2','3'",
				'default' => '3'
			],
			'jurusan' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'rombel' => [
				'type' => 'VARCHAR',
				'constraint' => 10
			],
			'status' => [
				'type' => 'ENUM',
				'constraint' => "'aktif','tidak aktif'",
				'default' => 'aktif'
			],
		]);

		//Primary key
		$this->forge->addKey('nisn', TRUE);
		$this->forge->addUniqueKey('email_siswa');
		$this->forge->addUniqueKey('no_kip');
		$this->forge->addUniqueKey('no_rek');

		//Membuat tabel guru
		$this->forge->createTable('siswa', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//Hapus tabel
		$this->forge->dropTable('siswa');
	}
}
