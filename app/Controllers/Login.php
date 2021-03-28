<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view("login");
    }

    public function auth()
    {
        $user = new userModel();
        $email = $this->request->getVar('email');
        $password = md5($this->request->getVar('password'));
        $datauser = $user->where(['email' => $email])->orWhere(['nomor_induk' => $email])->first();
        if ($datauser) {
            if ($password == $datauser['password']) {
                session()->set([
                    'id' => $datauser['id'],
                    'email' => $datauser['email'],
                    'password' => $datauser['password'],
                    'nama' => $datauser['nama'],
                    'nomor_induk' => $datauser['nomor_induk'],
                    'role' => $datauser['role'],
                    'logged_in' => TRUE,
                ]);
                $role = session()->get('role');
                if ($role == 'operator') {
                    return redirect()->to(base_url('operator/dashboard'));
                } else if ($role == 'siswa' or $role == 'guru' or $role == 'pegawai' or $role == 'alumni') {
                    return redirect()->to(base_url('user/dashboard'));
                } else if ($role == 'pimpinan') {
                    return redirect()->to(base_url('pimpinan/dashboard'));
                }
            } else {
                session()->setFlashdata('error', 'Email & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Email belum terdaftar');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    //--------------------------------------------------------------------

}
