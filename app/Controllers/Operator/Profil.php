<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GuruModel;
use App\Models\PegawaiModel;

class Profil extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $user;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->user = new UserModel();
        $this->guru = new GuruModel();
        $this->pegawai = new PegawaiModel();
    }

    public function index()
    {
        if (!empty($this->guru->where(['nik' => session()->get('nik')])->first())) {
            $data['profil'] = $this->guru->where(['nik' => session()->get('nik')])->first();
        } else if (!empty($this->pegawai->where(['nik' => session()->get('nik')])->first())) {
            $data['profil'] = $this->pegawai->where(['nik' => session()->get('nik')])->first();
        }
        $data['user'] = $this->user->where(['nik' => session()->get('nik')])->first();
        echo view('operator/profil', $data);
    }

    //--------------------------------------------------------------------

    public function resetpassword($id)
    {
        $dataUser = $this->user->find($id);
        if (empty($dataUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data User tidak ditemukan!');
        }
        $data['user'] = $dataUser;
        return view('operator/resetpassword', $data);
    }

    public function reset($id)
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ],
            'password_baru' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password baru belum diisi',
                    'minlength' => 'Password harus lebih dari 8'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password_baru]',
                'errors' => [
                    'required' => 'Password belum dikonfirmasi',
                    'matches' => 'Password tidak sama'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $user = $this->user->where(['nik' => $id])->first();
        $password = md5($this->request->getVar('password'));
        if ($password == $user->password) {
            $this->user->update($id, [
                'password' => md5($this->request->getVar('password_baru')),
            ]);
            session()->set([
                'password' => md5($this->request->getVar('password_baru')),
            ]);
        } else {
            session()->setFlashdata('error', 'Password lama salah');
            return redirect()->back();
        }
        session()->setFlashdata('message', 'Berhasil Mengubah Password');
        return redirect()->to(base_url("operator/profil"));
    }

    public function update($id)
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email,nik,' . $id . ']',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email harus valid',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        if (!empty($this->guru->where(['nik' => session()->get('nik')])->first())) {
            $this->guru->update($id, [
                'kecamatan' => $this->request->getVar('kecamatan'),
                'alamat' => $this->request->getVar('alamat'),
                'no_hp' => $this->request->getVar('no_hp'),
                'email_guru' => $this->request->getVar('email'),
            ]);
        } else if (!empty($this->pegawai->where(['nik' => session()->get('nik')])->first())) {
            $this->pegawai->update($id, [
                'kecamatan' => $this->request->getVar('kecamatan'),
                'alamat' => $this->request->getVar('alamat'),
                'no_hp' => $this->request->getVar('no_hp'),
                'email_guru' => $this->request->getVar('email'),
            ]);
        }
        session()->setFlashdata('message', 'Berhasil Mengubah Profil');
        return redirect()->to(base_url("operator/profil"));
    }
}
