<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    public function index()
    {
        return view('user/pegawai/list');
    }

    //--------------------------------------------------------------------

}
