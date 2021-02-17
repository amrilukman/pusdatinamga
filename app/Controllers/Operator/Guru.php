<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Guru extends BaseController
{
    public function index()
    {
        return view('operator/guru/list');
    }

    //--------------------------------------------------------------------

    public function add()
    {
        return view('operator/guru/add');
    }

    public function edit()
    {
        return view('operator/guru/edit');
    }

    public function delete($id = null)
    {
        if ($this->cs_model->delete($id)) {
            return view('operator/guru/list');
        }
    }
}
