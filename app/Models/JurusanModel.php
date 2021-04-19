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
}
