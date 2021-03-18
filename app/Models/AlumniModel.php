<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table = "alumni";
    protected $primaryKey = "nisn";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['nisn', 'nama_alumni', 'jurusan', 'rombel', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'email_alumni', 'kecamatan', 'alamat', 'tahun_lulus', 'status', 'instansi'];
}
