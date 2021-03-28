<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['user'] = $model->where(['id' => session()->get('id')])->first();
        //echo view('operator/__partial/navbar', $data);
        echo view('operator/dashboard', $data);
    }

    //--------------------------------------------------------------------

}
