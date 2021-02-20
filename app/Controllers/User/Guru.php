<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Guru extends BaseController
{
    public function index()
    {
        return view('user/guru/list');
    }

    //--------------------------------------------------------------------

}
