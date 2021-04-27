<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\JurusanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Guru extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $guru;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->guru = new GuruModel();
        $this->jurusan = new JurusanModel();
    }

    public function index()
    {
        $jurusan = $this->request->getGet('jurusan');
        $keyword = $this->request->getGet('keyword');

        $data['jurusan'] = $jurusan;
        $data['keyword'] = $keyword;

        //dropdown
        $jurusans = $this->jurusan->findAll();
        $data['jurusans'] = ['' => 'Semua Jurusan'] + array_column($jurusans, 'nama_jurusan', 'id_jurusan');

        //filter
        $where = [];
        $like = [];
        $or_like = [];

        if (!empty($jurusan)) {
            $where = ['guru.jurusan' => $jurusan];
        }

        if (!empty($keyword)) {
            $like = ['guru.nama_guru' => $keyword];
            $or_like = [
                'guru.nip' => $keyword,
                'guru.nuptk' => $keyword,
                'guru.nik' => $keyword,
                'guru.npwp' => $keyword,
                'guru.sk_cpns' => $keyword,
                'guru.email_guru' => $keyword,
            ];
        }

        //end filter

        //pagination
        $data['guru'] = $this->guru->join('jurusan', 'jurusan.id_jurusan = guru.jurusan')->where($where)->like($like)->orLike($or_like)->orderBy('nama_guru', 'ASC')->paginate(25, 'guru');
        $data['jumlah'] = $this->guru->countAll();
        $data['pager'] = $this->guru->pager;
        return view('user/guru/list', $data);
    }

    //--------------------------------------------------------------------

}
