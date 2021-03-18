<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Operator extends Seeder
{
	public function run()
	{
		//insert data
		$operator_data = [
			'id_operator' => '2',
			'email' => 'admin1@admin.com',
			'password' => 'admin',
			'nama' => 'Amri Lukman'
		];

		$this->db->table('operator')->insert($operator_data);
	}
}
