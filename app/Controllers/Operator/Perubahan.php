<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PerubahanModel;

class Perubahan extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->user = new UserModel();
        $this->perubahan = new PerubahanModel();
    }

    public function index()
    {
        //
    }

    public function detail($id)
    {
        $data['data'] = $this->perubahan->join('user', 'user.nik = perubahan.nik')->find($id);

        return view('operator/perubahan/detail', $data);
    }

    public function download($id)
    {
        $data = $this->perubahan->find($id);
        return $this->response->download(WRITEPATH . 'uploads/berkas/' . $data->berkas, null);
    }

    public function selesai($id)
    {
        $this->perubahan->delete($id);
        return redirect()->to('/operator/dashboard');
    }
}
