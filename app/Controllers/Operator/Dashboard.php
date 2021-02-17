<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('operator/dashboard');
    }

    //--------------------------------------------------------------------

}
