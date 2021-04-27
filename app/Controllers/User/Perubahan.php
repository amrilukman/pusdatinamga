<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PerubahanModel;

class Perubahan extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $perubahan;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->perubahan = new PerubahanModel();
    }

    public function index()
    {
        //
    }

    public function add()
    {
        return view('user/perubahan/add');
    }

    public function store()
    {
        if (!$this->validate([
            'berkas' => [
                'rules' => 'uploaded[berkas]|mime_in[berkas,image/jpg,image/jpeg,image/png]|max_size[berkas,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'Format File Harus Berupa jpg/jpeg/png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withINput();
        }

        $databerkas = $this->request->getFile('berkas');
        $fileName = $databerkas->getName();
        $this->perubahan->insert([
            'nik' => session()->get('nik'),
            'kategori_perubahan' => $this->request->getVar('kategori'),
            'deskripsi_perubahan' => $this->request->getVar('deskripsi'),
            'berkas' => $fileName,
        ]);

        $databerkas->move(WRITEPATH . 'uploads\berkas', $fileName);
        session()->setFlashdata('message', 'Permintaan Perubahan Data Akan Diterima Operator');
        return redirect()->to(base_url('user/dashboard'));
    }
}
