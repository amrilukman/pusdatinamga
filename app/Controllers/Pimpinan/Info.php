<?php

namespace App\Controllers\pimpinan;

use App\Controllers\BaseController;
use App\Models\InfoModel;

class Info extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $info;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->info = new InfoModel();
    }

    public function index()
    {
    }

    public function add()
    {
        return view('pimpinan/info/add');
    }

    public function store()
    {
        $this->info->insert([
            'judul_info' => $this->request->getVar('judul_info'),
            'deskripsi_info' => $this->request->getVar('deskripsi'),
            'link_info' => $this->request->getVar('link_info'),
            'tgl_awal' => date("Y-m-d"),
            'tgl_akhir' => $this->request->getVar('tgl_akhir'),
            'nama_submit' => session()->get('nama'),
        ]);

        session()->setFlashdata('message', 'Berhasil Menambahkan Pengumuman');
        return redirect()->to(base_url("pimpinan/dashboard"));
    }

    public function delete($id)
    {
        $dataInfo = $this->info->find($id);
        if (empty($dataInfo)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengumuman tidak ditemukan!');
        }

        $this->info->delete($id);
        session()->setFlashdata('message', 'Berhasil Menghapus Pengumuman');
        return redirect()->to('/pimpinan/dashboard');
    }

    public function edit($id)
    {
        $dataInfo = $this->info->find($id);
        if (empty($dataInfo)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengumuman tidak ditemukan!');
        }

        $data['info'] = $dataInfo;
        return view('pimpinan/info/edit', $data);
    }

    public function update($id)
    {
        $this->info->update($id, [
            'judul_info' => $this->request->getVar('judul_info'),
            'deskripsi_info' => $this->request->getVar('deskripsi'),
            'link_info' => $this->request->getVar('link_info'),
            'tgl_akhir' => $this->request->getVar('tgl_akhir'),
            'nama_submit' => session()->get('nama'),
        ]);

        session()->setFlashdata('message', 'Berhasil Megubah Pengumuman');
        return redirect()->to(base_url("pimpinan/dashboard"));
    }
}
