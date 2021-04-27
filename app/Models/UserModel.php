<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'nik';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $allowedFields = ['nik', 'nomor_induk', 'email', 'nama', 'password', 'role'];
}
