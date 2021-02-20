<?php

namespace App\Controllers\Pimpinan;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    public function index()
    {
        return view('pimpinan/pegawai/list');
    }

    //--------------------------------------------------------------------

}
