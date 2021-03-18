<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alumni extends Migration
{
	public function up()
	{
		//Tabel guru
		$this->forge->addField([
			'nisn' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'email_alumni' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'nama_alumni' => [
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
			'no_hp' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
			],
			'jurusan' => [
				'type' => 'VARCHAR',
				'constraint' => 30
			],
			'rombel' => [
				'type' => 'VARCHAR',
				'constraint' => 10
			],
			'tahun_lulus' => [
				'type' => 'YEAR',
				'constraint' => 4,
				'default' => 2021
			],
			'status' => [
				'type' => 'ENUM',
				'constraint' => "'Belum Bekerja','Bekerja','Kuliah'",
				'default' => 'Belum Bekerja'
			],
			'instansi' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
				'NULL' => true
			],
		]);

		//Primary key
		$this->forge->addKey('nisn', TRUE);
		$this->forge->addUniqueKey('email_alumni');


		//Membuat tabel guru
		$this->forge->createTable('alumni', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//Hapus tabel
		$this->forge->dropTable('alumni');
	}
}
