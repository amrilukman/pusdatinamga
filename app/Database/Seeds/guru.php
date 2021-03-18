<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Guru extends Seeder
{
	public function run()
	{
		//insert data
		$guru_data = [
			'nip' => '6460756658200033',
			'email_guru' => 'bangsoyamga@gmail.com',
			'nama_guru' => 'Ahmad Sholeh',
			'jenis_kelamin' => 'L',
			'tempat_lahir' => 'PEMALANG',
			'tanggal_lahir' => '1978-02-05',
			'nuptk' => '6460756658200033',
			'status_kepegawaian' => 'PNS',
			'guru_jurusan' => '9',
			'mapel1' => '803070800',
			'mapel2' => '803070900',
			'mapel3' => '803050400',
			'kecamatan' => 'Bantarbolang',
			'alamat' => 'Jl. Dahlia No. 45 RT 1 RW 3 Bantarbolang 52352',
			'no_hp' => '085226895959',
			'sk_cpns' => '813.3/150/U-08/2009',
			'npwp' => '893744888502000',
			'nik' => '3327062811780003'
		];

		$this->db->table('guru')->insert($guru_data);
	}
}
