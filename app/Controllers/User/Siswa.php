<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\JurusanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $siswa;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->siswa = new SiswaModel();
        $this->jurusan = new JurusanModel();
    }

    public function index()
    {
        $jurusan = $this->request->getGet('jurusan');
        $kelas = $this->request->getGet('kelas');
        $rombel = $this->request->getGet('rombel');
        $keyword = $this->request->getGet('keyword');

        $data['jurusan'] = $jurusan;
        $data['kelas'] = $kelas;
        $data['rombel'] = $rombel;
        $data['keyword'] = $keyword;

        //dropdown
        $jurusans = $this->jurusan->notLike('id_jurusan', 10)->findAll();
        $data['jurusans'] = ['' => 'Semua jurusan'] + array_column($jurusans, 'nama_jurusan', 'id_jurusan');

        $data['kelass'] = ['' => 'Semua Kelas'] + [1 => 'X'] + [2 => 'XI'] + [3 => 'XII'];


        if ($jurusan == 1) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'];
        } elseif ($jurusan == 2) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'] + [4 => '4'];
        } elseif ($jurusan == 3) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 4) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 5) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'];
        } elseif ($jurusan == 6) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'];
        } elseif ($jurusan == 7) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 8) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'];
        } elseif ($jurusan == 9) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } else {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        }

        //filter
        $wherejurusan = [];
        $wherekelas = [];
        $whererombel = [];
        $like = [];
        $or_like = [];

        if (!empty($jurusan)) {
            $wherejurusan = ['siswa.jurusan' => $jurusan];
        }

        if (!empty($kelas)) {
            $wherekelas = ['siswa.kelas' => $kelas];
        }

        if (!empty($rombel)) {
            $whererombel = ['siswa.rombel' => $rombel];
        }

        if (!empty($keyword)) {
            $like = ['siswa.nama_siswa' => $keyword];
            $or_like = [
                'siswa.nisn' => $keyword,
                'siswa.nik' => $keyword,
                'siswa.email_siswa' => $keyword,
            ];
        }

        //end filter

        //pagination
        $data['siswa'] = $this->siswa->join('jurusan', 'jurusan.id_jurusan = siswa.jurusan')->where($wherejurusan)->where($wherekelas)->where($whererombel)->like($like)->orLike($or_like)->orderBy('nama_siswa', 'ASC')->paginate(25, 'siswa');
        $data['jumlah'] = $this->siswa->countAll();
        $data['pager'] = $this->siswa->pager;
        return view('user/siswa/list', $data);
    }

    //--------------------------------------------------------------------

}
