<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Mapel extends BaseController
{
    public function index()
    {
        return view('operator/mapel/list');
    }

    //--------------------------------------------------------------------

    public function add()
    {
        return view('operator/mapel/add');
    }

    public function edit()
    {
        return view('operator/mapel/edit');
    }

    public function delete($id = null)
    {
        if ($this->cs_model->delete($id)) {
            return view('operator/mapel/list');
        }
    }
}
