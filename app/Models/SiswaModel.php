<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $primaryKey = "nisn";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['nisn', 'nama_siswa', 'kelas', 'jurusan', 'rombel', 'email_siswa', 'kecamatan', 'alamat', 'penerima_kps', 'no_kip', 'no_rek', 'no_hp', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'status'];
}
