<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GuruModel;
use App\Models\PegawaiModel;

class User extends BaseController
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
        $role = $this->request->getGet('role');
        $keyword = $this->request->getGet('keyword');

        $data['role'] = $role;
        $data['keyword'] = $keyword;

        //dropdown
        $data['roles'] = ['' => 'Semua Role'] + ['operator' => 'Operator'] + ['pimpinan' => 'Pimpinan'] + ['guru' => 'Guru'] + ['pegawai' => 'Pegawai'] + ['user' => 'user'] + ['alumni' => 'Alumni'];

        $whererole = [];
        $like = [];
        $or_like = [];

        if (!empty($role)) {
            $whererole = ['user.role' => $role];
        }

        if (!empty($keyword)) {
            $like = ['user.nama' => $keyword];
            $or_like = [
                'user.nomor_induk' => $keyword,
                'user.nik' => $keyword,
                'user.email' => $keyword,
            ];
        }
        //end filter

        //pagination
        $data['user'] = $this->user->where($whererole)->like($like)->orLike($or_like)->orderBy('nama', 'ASC')->paginate(25, 'user');
        $data['jumlah'] = $this->user->countAll();
        $data['pager'] = $this->user->pager;
        return view('operator/user/list', $data);
    }

    public function update($id)
    {
        $role = $this->request->getVar('role');
        $nik = $this->request->getVar('nik');

        if ($nik == session()->get('nik')) {
            if ($role == 'operator' || $role == 'pimpinan') {
                $this->user->update($id, ['role' => $role]);
            } else {
                if (!empty($this->guru->where(['nik' => $nik])->first())) {
                    $this->user->update($id, ['role' => 'guru']);
                    session()->destroy();
                    return redirect()->to('/login');
                } else if (!empty($this->pegawai->where(['nik' => $nik])->first())) {
                    $this->user->update($id, ['role' => 'pegawai']);
                    session()->destroy();
                    return redirect()->to('/login');
                }
            }
        } else {
            if ($role == 'operator' || $role == 'pimpinan') {
                $this->user->update($id, ['role' => $role]);
            } else {
                if (!empty($this->guru->where(['nik' => $nik])->first())) {
                    $this->user->update($id, ['role' => 'guru']);
                } else if (!empty($this->pegawai->where(['nik' => $nik])->first())) {
                    $this->user->update($id, ['role' => 'pegawai']);
                }
            }
        }

        session()->setFlashdata('message', 'Berhasil Mengubah Role');
        return redirect()->to('/operator/user/list');
    }

    public function resetpassword()
    {
        $request = \Config\Services::request();
        $id_users = $request->getPost('id_users');

        foreach ($id_users as $id_user) {
            $where = ['nik' => $id_user];
            $this->user->where($where)->update($id_user, ['password' => md5('12345678')]);
        }

        session()->setFlashdata('message', 'Berhasil Melakukan Reset Password');
        return redirect()->to('/operator/user/list');
    }

    public function edit($id)
    {
        $dataUser = $this->user->find($id);
        if (empty($dataUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data siswa tidak ditemukan!');
        }
        $data['user'] = $dataUser;
        return view('/operator/user/edit', $data);
    }
}
