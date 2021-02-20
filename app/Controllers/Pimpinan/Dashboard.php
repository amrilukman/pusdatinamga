<?php

namespace App\Controllers\Pimpinan;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('pimpinan/dashboard');
    }

    //--------------------------------------------------------------------

}
