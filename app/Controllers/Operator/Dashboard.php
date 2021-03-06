<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GuruModel;
use App\Models\PegawaiModel;
use App\Models\SiswaModel;
use App\Models\AlumniModel;
use App\Models\JurusanModel;
use App\Models\InfoModel;
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
        $this->info = new InfoModel();
        $this->perubahan = new PerubahanModel();
    }

    public function index()
    {
        $data['user'] = $this->user->where(['nik' => session()->get('nik')])->first();

        $data['info'] = $this->info->findAll();

        $data['jumlah_perubahan'] = count($this->perubahan->where('status', 'processed')->findAll());
        $data['perubahan'] = $this->perubahan->join('user', 'user.nik = perubahan.nik')->where('status', 'processed')->findAll();


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

        echo view('operator/dashboard', $data);
    }

    //--------------------------------------------------------------------

}
