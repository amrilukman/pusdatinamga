<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function index()
    {
        return view('operator/siswa/list');
    }

    //--------------------------------------------------------------------

    public function add()
    {
        return view('operator/siswa/add');
    }

    public function edit()
    {
        return view('operator/siswa/edit');
    }

    public function delete($id = null)
    {
        if ($this->cs_model->delete($id)) {
            return view('operator/siswa/list');
        }
    }
}
