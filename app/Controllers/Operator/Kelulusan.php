<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\JurusanModel;
use App\Models\AlumniModel;

class Kelulusan extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $kelulusan;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->siswa = new SiswaModel();
        $this->jurusan = new JurusanModel();
        $this->alumni = new AlumniModel();
    }

    public function index()
    {
        $jurusan = $this->request->getGet('jurusan');
        $rombel = $this->request->getGet('rombel');
        $keyword = $this->request->getGet('keyword');

        $data['jurusan'] = $jurusan;
        $data['rombel'] = $rombel;
        $data['keyword'] = $keyword;

        //dropdown
        $jurusans = $this->jurusan->notLike('id_jurusan', 10)->findAll();
        $data['jurusans'] = ['' => 'Semua jurusan'] + array_column($jurusans, 'nama_jurusan', 'id_jurusan');

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
        $whererombel = [];
        $like = [];
        $or_like = [];

        if (!empty($jurusan)) {
            $wherejurusan = ['siswa.jurusan' => $jurusan];
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
        $data['siswa'] = $this->siswa->join('jurusan', 'jurusan.id_jurusan = siswa.jurusan')->where($wherejurusan)->where('siswa.kelas', 3)->where($whererombel)->like($like)->orLike($or_like)->orderBy('nama_siswa', 'ASC')->paginate(25, 'siswa');
        $data['jumlah'] = $this->siswa->countAll();
        $data['pager'] = $this->siswa->pager;
        return view('operator/kelulusan/list', $data);
    }

    //--------------------------------------------------------------------

    public function editlulus()
    {
        $request = \Config\Services::request();
        $id_siswas = $request->getPost('id_siswas');

        foreach ($id_siswas as $id_siswa) {
            $where = ['nisn' => $id_siswa];
            $this->siswa->where($where)->update($id_siswa, ['status' => 'Lulus']);
        }

        session()->setFlashdata('message', 'Berhasil Mengubah Data Kelulusan');
        return redirect()->to(base_url("operator/kelulusan/list"));
    }

    public function edittidaklulus()
    {
        $request = \Config\Services::request();
        $id_siswas = $request->getPost('id_siswas');

        foreach ($id_siswas as $id_siswa) {
            $where = ['nisn' => $id_siswa];
            $this->siswa->where($where)->update($id_siswa, ['status' => 'Tidak Lulus']);
        }

        session()->setFlashdata('message', 'Berhasil Mengubah Data Kelulusan');
        return redirect()->to(base_url("operator/kelulusan/list"));
    }

    public function resetkelulusan()
    {
        $this->siswa->resetkelulusan();

        $siswaLulus = $this->siswa->where('kelas', 3)->where('status', 'Lulus')->get();
        foreach ($siswaLulus->getResultObject() as $alumni) {
            $id_siswa = $alumni->nisn;
            $this->siswa->delete($id_siswa);
        }

        $this->siswa->addUserAlumni();

        session()->setFlashdata('message', 'Berhasil Mereset Data Kelulusan');
        return redirect()->to(base_url("operator/kelulusan/list"));
    }
}
