<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    public function index()
    {
        return view('operator/pegawai/list');
    }

    //--------------------------------------------------------------------

    public function add()
    {
        return view('operator/pegawai/add');
    }

    public function edit()
    {
        return view('operator/pegawai/edit');
    }

    public function delete($id = null)
    {
        if ($this->cs_model->delete($id)) {
            return view('operator/pegawai/list');
        }
    }
}
