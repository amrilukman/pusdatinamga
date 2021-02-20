<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Alumni extends BaseController
{
    public function index()
    {
        return view('user/alumni/list');
    }

    //--------------------------------------------------------------------

}
