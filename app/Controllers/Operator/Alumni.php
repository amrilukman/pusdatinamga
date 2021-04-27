<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\AlumniModel;
use App\Models\JurusanModel;
use App\Models\UserModel;

class Alumni extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $alumni;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->alumni = new AlumniModel();
        $this->jurusan = new JurusanModel();
        $this->user = new UserModel();
    }

    public function index()
    {
        $jurusan = $this->request->getGet('jurusan');
        $rombel = $this->request->getGet('rombel');
        $tahun_lulus = $this->request->getGet('tahun_lulus');
        $keyword = $this->request->getGet('keyword');

        $data['jurusan'] = $jurusan;
        $data['rombel'] = $rombel;
        $data['tahun_lulus'] = $tahun_lulus;
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

        $data['tahun_luluss'] = ['' => 'Tahun']
            + [2004 => '2004'] + [2005 => '2005'] + [2006 => '2006']
            + [2007 => '2007'] + [2008 => '2008'] + [2009 => '2009']
            + [2010 => '2010'] + [2011 => '2011'] + [2012 => '2012']
            + [2013 => '2013'] + [2014 => '2014'] + [2015 => '2015']
            + [2016 => '2016'] + [2017 => '2017'] + [2018 => '2018']
            + [2019 => '2019'] + [2020 => '2020'] + [2021 => '2021'];

        //filter
        $wherejurusan = [];
        $whererombel = [];
        $wheretahun_lulus = [];
        $like = [];
        $or_like = [];

        if (!empty($jurusan)) {
            $wherejurusan = ['alumni.jurusan' => $jurusan];
        }

        if (!empty($rombel)) {
            $whererombel = ['alumni.rombel' => $rombel];
        }

        if (!empty($tahun_lulus)) {
            $wheretahun_lulus = ['alumni.tahun_lulus' => $tahun_lulus];
        }

        if (!empty($keyword)) {
            $like = ['alumni.nama_alumni' => $keyword];
            $or_like = [
                'alumni.nisn' => $keyword,
                'alumni.nik' => $keyword,
                'alumni.email_alumni' => $keyword,
            ];
        }
        //end filter

        //pagination
        $data['alumni'] = $this->alumni->join('jurusan', 'jurusan.id_jurusan = alumni.jurusan')->where($wherejurusan)->where($whererombel)->where($wheretahun_lulus)->like($like)->orLike($or_like)->orderBy('nama_alumni', 'ASC')->paginate(25, 'alumni');
        $data['jumlah'] = $this->alumni->countAll();
        $data['pager'] = $this->alumni->pager;
        return view('operator/alumni/list', $data);
    }

    //--------------------------------------------------------------------

    public function add()
    {
        $data['jurusan'] = $this->jurusan->notLike('id_jurusan', 10)->findAll();
        return view('operator/alumni/add', $data);
    }

    public function store()
    {
        $rombel = $this->request->getVar('rombel');
        if ($rombel == '') {
            $rombel = 1;
        }

        $instansi = $this->request->getVar('instansi');
        if ($instansi == '') {
            $instansi = NULL;
        }
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[user.nik]',
                'errors' => [
                    'is_unique' => 'NIK Sudah Ada',
                    'required' => 'NIK Harus Diisi',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email harus valid',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'nisn' => [
                'rules' => 'required|is_unique[user.nomor_induk]',
                'errors' => [
                    'required' => 'NISN Harus Diisi',
                    'is_unique' => 'NISN Sudah Ada',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data['jurusan'] = $this->jurusan->notLike('id_jurusan', 10)->get();

        $this->alumni->insert([
            'nik' => $this->request->getVar('nik'),
            'nama_alumni' => $this->request->getVar('nama'),
            'tempat_lahir' => strtoupper($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kecamatan' => strtoupper($this->request->getVar('kecamatan')),
            'alamat' => $this->request->getVar('alamat'),
            'email_alumni' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nisn' => $this->request->getVar('nisn'),
            'jurusan' => $this->request->getVar('jurusan'),
            'rombel' => $rombel,
            'tahun_lulus' => $this->request->getVar('tahun_lulus'),
            'status' => $this->request->getVar('status'),
            'instansi' => $instansi,
        ]);

        $this->user->insert([
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'nomor_induk' => $this->request->getVar('nisn'),
            'email' => $this->request->getVar('email'),
            'password' => md5('12345678'),
            'role' => 'alumni',
        ]);

        session()->setFlashdata('message', 'Berhasil Menambahkan Data Alumni Baru');
        return redirect()->to(base_url("operator/alumni/list"));
    }

    public function edit($id)
    {
        $dataAlumni = $this->alumni->find($id);
        if (empty($dataAlumni)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Alumni tidak ditemukan!');
        }
        $data['alumni'] = $dataAlumni;
        $data['jurusan'] = $this->jurusan->notLike('id_jurusan', 10)->findAll();
        return view('operator/alumni/edit', $data);
    }

    public function update($id)
    {
        $rombel = $this->request->getVar('rombel');
        if ($rombel == '') {
            $rombel = 1;
        }

        $instansi = $this->request->getVar('instansi');
        if ($instansi == '') {
            $instansi = NULL;
        }
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[user.nik,nomor_induk,' . $id . ']',
                'errors' => [
                    'is_unique' => 'NIK Sudah Ada',
                    'required' => 'NIK Harus Diisi',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email,nomor_induk,' . $id . ']',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email harus valid',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'nisn' => [
                'rules' => 'required|is_unique[user.nomor_induk,nomor_induk,' . $id . ']',
                'errors' => [
                    'required' => 'NISN Harus Diisi',
                    'is_unique' => 'NISN Sudah Ada',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data['jurusan'] = $this->jurusan->notLike('id_jurusan', 10)->get();

        $this->alumni->update($id, [
            'nik' => $this->request->getVar('nik'),
            'nama_alumni' => $this->request->getVar('nama'),
            'tempat_lahir' => strtoupper($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kecamatan' => strtoupper($this->request->getVar('kecamatan')),
            'alamat' => $this->request->getVar('alamat'),
            'email_alumni' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nisn' => $this->request->getVar('nisn'),
            'jurusan' => $this->request->getVar('jurusan'),
            'rombel' => $rombel,
            'tahun_lulus' => $this->request->getVar('tahun_lulus'),
            'status' => $this->request->getVar('status'),
            'instansi' => $instansi,
        ]);

        $this->user->update($id, [
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'nomor_induk' => $this->request->getVar('nisn'),
            'email' => $this->request->getVar('email'),
            'password' => old('password'),
            'role' => 'alumni',
        ]);

        session()->setFlashdata('message', 'Berhasil Mengubah Data Alumni');
        return redirect()->to(base_url("operator/alumni/list"));
    }

    public function deleteuser()
    {
        $request = \Config\Services::request();
        $id_alumnis = $request->getPost('id_alumnis');

        foreach ($id_alumnis as $id_alumni) {
            $where = ['nisn' => $id_alumni];
            $this->alumni->where($where)->delete($id_alumni);
            $this->user->where('nomor_induk', $id_alumni)->delete($id_alumni);
        }

        session()->setFlashdata('message', 'Berhasil Menghapus Data');
        return redirect()->to('/operator/alumni/list');
    }
}
