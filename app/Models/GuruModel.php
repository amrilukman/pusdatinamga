<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\Model;

//if (!defined('BASEPATH')) exit('No direct script access allowed');

class GuruModel extends Model
{
    protected $table = "guru";
    protected $primaryKey = "nik";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nip', 'email_guru', 'nama_guru', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nuptk', 'status_kepegawaian', 'jurusan', 'kecamatan', 'alamat', 'no_hp', 'sk_cpns', 'npwp', 'nik'];

    //Fetch records
    public function getGuru()
    {
        // Guru
        $db      = \Config\Database::connect();
        $builder = $db->table('guru');
        $builder->select('*')->from('guru')->orderBy('nik', 'asc');
        $guruquery = $builder->get();

        $guruResult = $guruquery->getResultArray();

        return $guruResult;
    }

    //Delete record
    public function deleteUser($id_gurus = [])
    {
        foreach ($id_gurus as $id_guru) {
            $db      = \Config\Database::connect();
            $builder = $db->table('guru');
            $builder->delete('guru')->getWhere(['nik' => $id_guru]);
        }

        return 1;
    }
}
