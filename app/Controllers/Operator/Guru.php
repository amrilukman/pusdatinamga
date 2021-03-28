<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\GuruModel;

class Guru extends BaseController
{
    protected $guru;

    function __construct()
    {
        $this->guru = new GuruModel();
    }

    public function index()
    {
        $data['guru'] = $this->guru->findAll();
        return view('operator/guru/list', $data);
    }

    //--------------------------------------------------------------------

    public function add()
    {
        return view('operator/guru/add');
    }

    public function store()
    {
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
                'rules' => 'required|is_unique[guru.nip]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'NIP sudah ada'
                ]
            ],
            'nuptk' => [
                'rules' => 'required|is_unique[guru.nuptk]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'NUPTK sudah ada'
                ]
            ],
            'npwp' => [
                'rules' => 'required|is_unique[guru.npwp]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'NPWP sudah ada'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'mapel1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'mapel2' => [
                'rules' => 'permit_empty'
            ],
            'mapel3' => [
                'rules' => 'permit_empty'
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
            'nip' => $this->request->getVar('nip'),
            'nuptk' => $this->request->getVar('nuptk'),
            'npwp' => $this->request->getVar('npwp'),
            'status_kepegawaian' => $this->request->getVar('status'),
            'sk_cpns' => $this->request->getVar('sk-cpns'),
            'guru_jurusan' => $this->request->getVar('jurusan'),
            'mapel1' => $this->request->getVar('mapel1'),
            'mapel2' => $this->request->getVar('mapel2'),
            'mapel3' => $this->request->getVar('mapel3')
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
        $this->guru->delete($id);
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[guru.nik]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    //'is_unique' => 'NIK sudah ada'
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
                    //'is_unique' => 'Email sudah ada'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nip' => [
                'rules' => 'required|is_unique[guru.nip]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    //'is_unique' => 'NIP sudah ada'
                ]
            ],
            'nuptk' => [
                'rules' => 'required|is_unique[guru.nuptk]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    //'is_unique' => 'NUPTK sudah ada'
                ]
            ],
            'npwp' => [
                'rules' => 'required|is_unique[guru.npwp]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    //'is_unique' => 'NPWP sudah ada'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'mapel1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'mapel2' => [
                'rules' => 'permit_empty'
            ],
            'mapel3' => [
                'rules' => 'permit_empty'
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
            'nip' => $this->request->getVar('nip'),
            'nuptk' => $this->request->getVar('nuptk'),
            'npwp' => $this->request->getVar('npwp'),
            'status_kepegawaian' => $this->request->getVar('status'),
            'sk_cpns' => $this->request->getVar('sk-cpns'),
            'guru_jurusan' => $this->request->getVar('jurusan'),
            'mapel1' => $this->request->getVar('mapel1'),
            'mapel2' => $this->request->getVar('mapel2'),
            'mapel3' => $this->request->getVar('mapel3')
        ]);
        session()->setFlashdata('message', 'Berhasil Mengubah Data Guru');
        return redirect()->to(base_url("operator/guru/list"));
    }
}
