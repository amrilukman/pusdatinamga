<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Wali extends BaseController
{
    public function index()
    {
        return view('operator/wali/list');
    }

    //--------------------------------------------------------------------

    public function add()
    {
        return view('operator/wali/add');
    }

    public function edit()
    {
        return view('operator/wali/edit');
    }

    public function delete($id = null)
    {
        if ($this->cs_model->delete($id)) {
            return view('operator/wali/list');
        }
    }
}
