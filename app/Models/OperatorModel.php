<?php

namespace App\Models;

use CodeIgniter\Model;

class OperatorModel extends Model
{
    protected $table = "operator";
    protected $primaryKey = "id_operator";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_operator', 'email', 'password', 'nama'];
}
