<?php

namespace App\Controllers\Pimpinan;

use App\Controllers\BaseController;

class Alumni extends BaseController
{
    public function index()
    {
        return view('pimpinan/alumni/list');
    }

    //--------------------------------------------------------------------

}
