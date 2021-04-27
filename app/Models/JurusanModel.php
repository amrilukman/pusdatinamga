<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table = "jurusan";
    protected $primaryKey = "id_jurusan";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_jurusan', 'nama_jurusan', 'akronim_jurusan', 'jumlah_rombel'];

    public function hitung()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jurusan');

        $builder->select('*');
        $jurusan = $builder->get();

        foreach ($jurusan->getResultObject() as $row) {
            $data['jumlah_siswa_jurusan'] =
                $builder = $db->table('siswa');
            $builder->select('nisn');
            $builder->where('jurusan', $row);
            $builder->countAll();
            $siswa = $builder->get();

            $data['jumlah_guru_jurusan'] =
                $builder = $db->table('guru');
            $builder->select('nik');
            $builder->where('jurusan', $row);
            $builder->countAll();
            $guru = $builder->get();
        }
    }
}
