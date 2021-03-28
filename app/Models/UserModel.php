<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $useTimestamps = false;
    protected $allowedFields = ['id', 'nomor_induk', 'email', 'nama', 'password', 'role'];
}
