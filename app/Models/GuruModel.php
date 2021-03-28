<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = "guru";
    protected $primaryKey = "nip";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nip', 'email_guru', 'nama_guru', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nuptk', 'status_kepegawaian', 'guru_jurusan', 'mapel1', 'mapel2', 'mapel3', 'kecamatan', 'alamat', 'no_hp', 'sk_cpns', 'npwp', 'nik'];
}
