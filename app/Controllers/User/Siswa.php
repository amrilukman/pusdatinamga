<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function index()
    {
        return view('user/siswa/list');
    }

    //--------------------------------------------------------------------

}
