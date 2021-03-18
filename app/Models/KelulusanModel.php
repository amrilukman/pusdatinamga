<?php

namespace App\Models;

use CodeIgniter\Model;

class KelulusanModel extends Model
{
    protected $table = "kelulusan";
    protected $primaryKey = "id_kelulusan";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kelulusan', 'nama_siswa', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'email_siswa', 'jurusan', 'rombel', 'kelas', 'kecamatan', 'alamat', 'no_hp', 'sk_kelulusan', 'status'];
}
