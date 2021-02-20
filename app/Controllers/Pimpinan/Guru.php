<?php

namespace App\Controllers\Pimpinan;

use App\Controllers\BaseController;

class Guru extends BaseController
{
    public function index()
    {
        return view('pimpinan/guru/list');
    }

    //--------------------------------------------------------------------

}
