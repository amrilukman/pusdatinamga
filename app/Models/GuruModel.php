<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = "guru";
    protected $primaryKey = "nik";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nip', 'email_guru', 'nama_guru', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nuptk', 'status_kepegawaian', 'jurusan', 'kecamatan', 'alamat', 'no_hp', 'sk_cpns', 'npwp', 'nik'];

    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
}
