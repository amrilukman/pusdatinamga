<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
	public function up()
	{
		//Tabel guru
		$this->forge->addField([
			'id_pegawai' => [
				'type' => 'INT',
				'constraint' => 30,
				'auto_increment' => true
			],
			'email_pegawai' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'nama_pegawai' => [
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
			'status_kepegawaian' => [
				'type' => 'ENUM',
				'constraint' => "'PNS','Non-PNS','Honorer'",
				'default' => 'PNS'
			],
			'kategori' => [
				'type' => 'INT',
				'constraint' => 10
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
				'NULL' => true
			],
			'nik' => [
				'type' => 'ENUM',
				'constraint' => "'lulus','tidak lulus'",
				'default' => 'lulus'
			],
		]);

		//Primary key
		$this->forge->addKey('id_pegawai', TRUE);
		$this->forge->addUniqueKey('email_pegawai');
		$this->forge->addUniqueKey('sk_cpns');

		//Membuat tabel guru
		$this->forge->createTable('pegawai', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//Hapus tabel
		$this->forge->dropTable('pegawai');
	}
}
