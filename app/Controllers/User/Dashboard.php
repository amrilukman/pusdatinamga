<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GuruModel;
use App\Models\PegawaiModel;
use App\Models\SiswaModel;
use App\Models\AlumniModel;
use App\Models\JurusanModel;
use App\Models\InfoModel;
use App\Models\KategoriModel;
use App\Models\PerubahanModel;

class Dashboard extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->guru = new GuruModel();
        $this->pegawai = new PegawaiModel();
        $this->siswa = new SiswaModel();
        $this->alumni = new AlumniModel();
        $this->user = new UserModel();
        $this->jurusan = new JurusanModel();
        $this->kategori = new KategoriModel();
        $this->info = new InfoModel();
        $this->perubahan = new PerubahanModel();
    }

    public function index()
    {
        $data['jumlah_kelulusan'] = count($this->siswa->where('kelas', 3)->where('status', 'Lulus')->findAll());

        if (!empty($this->guru->where(['nik' => session()->get('nik')])->first())) {
            $data['data'] = $this->guru->join('jurusan', 'jurusan.id_jurusan = guru.jurusan')->where(['nik' => session()->get('nik')])->first();
        } else if (!empty($this->pegawai->where(['nik' => session()->get('nik')])->first())) {
            $data['data'] = $this->pegawai->join('kategori', 'kategori.id_kategori = pegawai.kategori')->where(['nik' => session()->get('nik')])->first();
        } else if (!empty($this->siswa->where(['nik' => session()->get('nik')])->first())) {
            $data['data'] = $this->siswa->join('jurusan', 'jurusan.id_jurusan = siswa.jurusan')->where(['nik' => session()->get('nik')])->first();
        } else if (!empty($this->alumni->where(['nik' => session()->get('nik')])->first())) {
            $data['data'] = $this->alumni->join('jurusan', 'jurusan.id_jurusan = alumni.jurusan')->where(['nik' => session()->get('nik')])->first();
        }

        $data['user'] = $this->user->where(['nik' => session()->get('nik')])->first();

        $data['info'] = $this->info->findAll();

        $data['jumlah_perubahan'] = count($this->perubahan->where('nik', session()->get('nik'))->findAll());
        $data['perubahan'] = $this->perubahan->join('user', 'user.nik = perubahan.nik')->where('perubahan.nik', session()->get('nik'))->findAll();

        $data['jumlah_siswa'] = $this->siswa->countAll();
        $data['jumlah_guru'] = $this->guru->countAll();
        $data['jumlah_pegawai'] = $this->pegawai->countAll();
        $data['jumlah_alumni'] = $this->alumni->countAll();

        $data['jumlah_siswa_tkj'] = count($this->siswa->where('jurusan', 1)->findAll());
        $data['jumlah_siswa_tkr'] = count($this->siswa->where('jurusan', 2)->findAll());
        $data['jumlah_siswa_tpm'] = count($this->siswa->where('jurusan', 3)->findAll());
        $data['jumlah_siswa_las'] = count($this->siswa->where('jurusan', 4)->findAll());
        $data['jumlah_siswa_tav'] = count($this->siswa->where('jurusan', 5)->findAll());
        $data['jumlah_siswa_tb'] = count($this->siswa->where('jurusan', 6)->findAll());
        $data['jumlah_siswa_dpib'] = count($this->siswa->where('jurusan', 7)->findAll());
        $data['jumlah_siswa_titl'] = count($this->siswa->where('jurusan', 8)->findAll());
        $data['jumlah_siswa_elin'] = count($this->siswa->where('jurusan', 9)->findAll());

        $data['jumlah_guru_tkj'] = count($this->guru->Where('jurusan', 1)->findAll());
        $data['jumlah_guru_tkr'] = count($this->guru->Where('jurusan', 2)->findAll());
        $data['jumlah_guru_tpm'] = count($this->guru->Where('jurusan', 3)->findAll());
        $data['jumlah_guru_las'] = count($this->guru->Where('jurusan', 4)->findAll());
        $data['jumlah_guru_tav'] = count($this->guru->Where('jurusan', 5)->findAll());
        $data['jumlah_guru_tb'] = count($this->guru->Where('jurusan', 6)->findAll());
        $data['jumlah_guru_dpib'] = count($this->guru->Where('jurusan', 7)->findAll());
        $data['jumlah_guru_titl'] = count($this->guru->Where('jurusan', 8)->findAll());
        $data['jumlah_guru_elin'] = count($this->guru->Where('jurusan', 9)->findAll());

        echo view('user/dashboard', $data);
    }

    //--------------------------------------------------------------------

    public function page()
    {
        $id = $this->request->getVar('nisn');
        $dataLulus = $this->siswa->where('nisn', $id)->orWhere('nama_siswa', $id)->first();
        if (empty($dataLulus)) {
            return view('user/kelulusan/notfound');
        }

        $data['data'] = $this->siswa->where('nisn', $id)->orWhere('nama_siswa', $id)->first();
        return view('user/kelulusan/page', $data);
    }
}
