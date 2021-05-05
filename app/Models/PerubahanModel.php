<?php

namespace App\Models;

use CodeIgniter\Model;

class PerubahanModel extends Model
{
    protected $table = "perubahan";
    protected $primaryKey = "id_perubahan";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_perubahan', 'nik', 'kategori_perubahan', 'berkas', 'deskripsi_perubahan', 'tgl_input', 'tgl_selesai', 'status', 'nama_operator'];
}
