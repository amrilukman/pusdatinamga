<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelulusan extends Migration
{
	public function up()
	{
		//Tabel guru
		$this->forge->addField([
			'id_kelulusan' => [
				'type' => 'INT',
				'constraint' => 30,
				'auto_increment' => true
			],
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
				'default' => 'L'
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
			'sk_kelulusan' => [
				'type' => 'VARCHAR',
				'constraint' => 30,
				'NULL' => true
			],
			'status' => [
				'type' => 'ENUM',
				'constraint' => "'lulus','tidak lulus'",
				'default' => 'lulus'
			],
		]);

		//Primary key
		$this->forge->addKey('id_kelulusan', TRUE);
		$this->forge->addUniqueKey('email_siswa');


		//Membuat tabel guru
		$this->forge->createTable('kelulusan', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//Hapus tabel
		$this->forge->dropTable('kelulusan');
	}
}
