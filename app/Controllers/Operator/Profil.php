<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profil extends BaseController
{
    protected $user;

    function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $data['user'] = $this->user->where(['id' => session()->get('id')])->first();
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
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password baru belum diisi',
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

        $user = $this->user->where(['id' => session()->get('id')])->first();
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
}
