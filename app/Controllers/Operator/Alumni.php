<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Alumni extends BaseController
{
    public function index()
    {
        return view('operator/alumni/list');
    }

    //--------------------------------------------------------------------

    public function add()
    {
        return view('operator/alumni/add');
    }

    public function edit()
    {
        return view('operator/alumni/edit');
    }

    public function delete($id = null)
    {
        if ($this->cs_model->delete($id)) {
            return view('operator/alumni/list');
        }
    }
}
