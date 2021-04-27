<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table = "info";
    protected $primaryKey = "id_info";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_info', 'judul_info', 'link_info', 'deskripsi_info', 'nama_submit'];
}
