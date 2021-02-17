<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Jurusan extends BaseController
{
    public function index()
    {
        return view('operator/jurusan/list');
    }

    //--------------------------------------------------------------------

    public function add()
    {
        return view('operator/jurusan/add');
    }

    public function edit()
    {
        return view('operator/jurusan/edit');
    }

    public function delete($id = null)
    {
        if ($this->cs_model->delete($id)) {
            return view('operator/jurusan/list');
        }
    }
}
