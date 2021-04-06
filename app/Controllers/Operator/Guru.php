<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\JurusanModel;
use App\Config\Services;

class Guru extends BaseController
{
    protected $guru;

    function __construct()
    {
        helper('form');
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
            $or_like = ['guru.nip' => $keyword];
        }

        //end filter

        //pagination
        $data['guru'] = $this->guru->join('jurusan', 'jurusan.id_jurusan = guru.jurusan')->where($where)->like($like)->orLike($or_like)->orderBy('nip', 'ASC')->paginate(25, 'guru');
        $data['pager'] = $this->guru->pager;
        return view('operator/guru/list', $data);
    }

    //--------------------------------------------------------------------

    public function add()
    {
        $data['jurusan'] = $this->jurusan->findAll();
        return view('operator/guru/add', $data);
    }

    public function store()
    {
        $nip = $this->request->getVar('nip');
        if ($nip == '') {
            $nip = NULL;
        }

        $nuptk = $this->request->getVar('nuptk');
        if ($nuptk == '') {
            $nuptk = NULL;
        }

        $npwp = $this->request->getVar('npwp');
        if ($npwp == '') {
            $npwp = NULL;
        }

        $sk_cpns = $this->request->getVar('sk-cpns');
        if ($sk_cpns == '') {
            $sk_cpns = NULL;
        }
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[guru.nik]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'NIK sudah ada'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[guru.email_guru]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email harus valid',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nip' => [
                'rules' => 'permit_empty|is_unique[guru.nip]',
                'errors' => [
                    'is_unique' => 'NIP sudah ada'
                ]
            ],
            'nuptk' => [
                'rules' => 'permit_empty|is_unique[guru.nuptk]',
                'errors' => [
                    'is_unique' => 'NUPTK sudah ada'
                ]
            ],
            'npwp' => [
                'rules' => 'permit_empty|is_unique[guru.npwp]',
                'errors' => [
                    'is_unique' => 'NPWP sudah ada'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'sk_cpns' => [
                'rules' => 'permit_empty|is_unique[guru.sk_cpns]',
                'errors' => [
                    'is_unique' => 'SK-CPNS Harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data['jurusan'] = $this->jurusan->get();


        $this->guru->insert([
            'nik' => $this->request->getVar('nik'),
            'nama_guru' => $this->request->getVar('nama'),
            'tempat_lahir' => strtoupper($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kecamatan' => strtoupper($this->request->getVar('kecamatan')),
            'alamat' => $this->request->getVar('alamat'),
            'email_guru' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nip' => $nip,
            'nuptk' => $nuptk,
            'npwp' => $npwp,
            'status_kepegawaian' => $this->request->getVar('status'),
            'sk_cpns' => $sk_cpns,
            'jurusan' => $this->request->getVar('jurusan'),
        ]);

        session()->setFlashdata('message', 'Berhasil Menambahkan Data Guru Baru');
        return redirect()->to(base_url("operator/guru/list"));
    }

    public function edit($id)
    {

        $dataGuru = $this->guru->find($id);
        if (empty($dataGuru)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Guru tidak ditemukan!');
        }
        $data['guru'] = $dataGuru;
        $data['jurusan'] = $this->jurusan->findAll();
        return view('operator/guru/edit', $data);
    }

    public function delete($id = null)
    {
        $dataGuru = $this->guru->find($id);
        if (empty($dataGuru)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data guru Tidak ditemukan !');
        }
        $this->guru->delete($id);
        session()->setFlashdata('message', 'Berhasil Menghapus Data Guru');
        return redirect()->to('/operator/guru/list');
    }

    public function update($id)
    {
        $nip = $this->request->getVar('nip');
        if ($nip == '') {
            $nip = NULL;
        }

        $nuptk = $this->request->getVar('nuptk');
        if ($nuptk == '') {
            $nuptk = NULL;
        }

        $npwp = $this->request->getVar('npwp');
        if ($npwp == '') {
            $npwp = NULL;
        }

        $sk_cpns = $this->request->getVar('sk-cpns');
        if ($sk_cpns == '') {
            $sk_cpns = NULL;
        }

        $this->guru->delete($id);
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[guru.nik]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'NIK sudah ada'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[guru.email_guru]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email harus valid',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nip' => [
                'rules' => 'permit_empty|is_unique[guru.nip]',
                'errors' => [
                    'is_unique' => 'NIP sudah ada'
                ]
            ],
            'nuptk' => [
                'rules' => 'permit_empty|is_unique[guru.nuptk]',
                'errors' => [
                    'is_unique' => 'NUPTK sudah ada'
                ]
            ],
            'npwp' => [
                'rules' => 'permit_empty|is_unique[guru.npwp]',
                'errors' => [
                    'is_unique' => 'NPWP sudah ada'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'sk_cpns' => [
                'rules' => 'permit_empty|is_unique[guru.sk_cpns]',
                'errors' => [
                    'is_unique' => 'SK-CPNS Harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->guru->insert([
            'nik' => $this->request->getVar('nik'),
            'nama_guru' => $this->request->getVar('nama'),
            'tempat_lahir' => strtoupper($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kecamatan' => strtoupper($this->request->getVar('kecamatan')),
            'alamat' => $this->request->getVar('alamat'),
            'email_guru' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nip' => $nip,
            'nuptk' => $nuptk,
            'npwp' => $npwp,
            'status_kepegawaian' => $this->request->getVar('status'),
            'sk_cpns' => $sk_cpns,
            'jurusan' => $this->request->getVar('jurusan'),
        ]);
        session()->setFlashdata('message', 'Berhasil Mengubah Data Guru');
        return redirect()->to(base_url("operator/guru/list"));
    }
}
