<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Controllers\Login;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Profil extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['user'] = $model->where(['id' => session()->get('id')])->first();
        echo view('operator/profil', $data);
    }

    //--------------------------------------------------------------------

    public function resetpassword()
    {
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'password' => 'required',
            'password_baru' => 'required',
            'password_verify' => 'matches[password_baru]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $password = md5($this->request->getVar('password'));
            if ($password == session()->get('password')) {
                $model->set([
                    "id" => $this->request->getVar('id'),
                    "password" => md5($this->request->getVar('password_baru')),
                ]);
                //session()->setFlashdata('success', 'Successfuly Updated');
                return redirect('operator/resetpassword');
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back();
            }
        }
        $data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('operator/resetpassword', $data);
    }
    // public function resetpassword()
    // {
    //     $data = [];
    //     helper(['form']);
    //     $model = new UserModel();
    //     $nomor_induk = $this->request->getVar('nomor_induk');
    //     $password = md5($this->request->getVar('password'));
    //     $password_baru = md5($this->request->getVar('password_baru'));

    //     if ($this->request->getMethod() == 'post') {
    //         $rules = [
    //             'nomor_induk' => 'required',
    //             'password' => 'required',
    //             'password_baru' => 'required',
    //             'password_confirm' => 'matches[password_required]'
    //         ];

    //         if (!$this->validate($rules)) {
    //             $data['validation'] = $this->validator;
    //         } else {
    //             if ($password == session()->get('password')) {
    //                 $newData = [
    //                     'id' => session()->get('id'),
    //                     'nomor_induk' => $nomor_induk,
    //                     'password' => $password_baru,
    //                 ];
    //                 $model->save($newData);
    //                 session()->setFlashdata('success', 'Successfuly Updated');
    //                 return redirect()->to('operator/profile/resetpassword');
    //             } else {
    //                 session()->setFlashdata('error', 'Password Salah');
    //                 return redirect()->back();
    //             }
    //         }
    //     }

    //     $data['user'] = $model->where(['nomor_induk' => session()->get('nomor_induk')])->first();
    //     echo view('operator/resetpassword', $data);
    // }
}
