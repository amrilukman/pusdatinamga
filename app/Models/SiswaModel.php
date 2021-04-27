<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $primaryKey = "nisn";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nisn', 'nama_siswa', 'kelas', 'jurusan', 'rombel', 'email_siswa', 'kecamatan', 'alamat', 'penerima_kip', 'no_kip', 'no_rek', 'no_hp', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'status', 'nik'];

    public function resetkelulusan()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');

        $builder->select('*');
        $builder->where('status', 'Lulus');
        $alumni = $builder->get();

        foreach ($alumni->getResultObject() as $alumni) {
            $data = [
                'nisn' => $alumni->nisn,
                'nama_alumni' => $alumni->nama_siswa,
                'jurusan' => $alumni->jurusan,
                'rombel' => $alumni->rombel,
                'tempat_lahir' => $alumni->tempat_lahir,
                'tanggal_lahir' => $alumni->tanggal_lahir,
                'jenis_kelamin' => $alumni->jenis_kelamin,
                'kecamatan' => $alumni->kecamatan,
                'email_alumni' => $alumni->email_siswa,
                'no_hp' => $alumni->no_hp,
                'alamat' => $alumni->alamat,
                'tahun_lulus' => date("Y"),
                'nik' => $alumni->nik,
            ];

            $db->table('alumni')->insert($data);
        }
    }

    public function addUserAlumni()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('alumni');

        $builder->select('*');
        $alumni = $builder->get();

        foreach ($alumni->getResultObject() as $alumni) {
            $data = [
                'nik' => $alumni->nik,
                'nomor_induk' => $alumni->nisn,
                'email' => $alumni->email_alumni,
                'password' => md5('12345678'),
                'role' => 'alumni',
                'nama' => $alumni->nama_alumni,
            ];

            $db->table('user')->insert($data);
        }
    }
}
