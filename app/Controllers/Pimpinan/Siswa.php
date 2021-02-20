<?php

namespace App\Controllers\Pimpinan;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function index()
    {
        return view('pimpinan/siswa/list');
    }

    //--------------------------------------------------------------------

}
