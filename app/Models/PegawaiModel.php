<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "nik";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_pegawai', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'status_kepegawaian', 'kategori', 'kecamatan', 'alamat', 'no_hp', 'email_pegawai', 'sk_cpns', 'nik', 'nuptk', 'sk_pengangkatan', 'npwp', 'nip'];
}
