<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\KategoriModel;

class Pegawai extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $pegawai;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->pegawai = new PegawaiModel();
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $kategori = $this->request->getGet('kategori');
        $keyword = $this->request->getGet('keyword');

        $data['kategori'] = $kategori;
        $data['keyword'] = $keyword;

        //dropdown
        $kategoris = $this->kategori->findAll();
        $data['kategoris'] = ['' => 'Semua kategori'] + array_column($kategoris, 'nama_kategori', 'id_kategori');

        //filter
        $where = [];
        $like = [];
        $or_like = [];

        if (!empty($kategori)) {
            $where = ['pegawai.kategori' => $kategori];
        }

        if (!empty($keyword)) {
            $like = ['pegawai.nama_pegawai' => $keyword];
            $or_like = [
                'pegawai.nip' => $keyword,
                'pegawai.nuptk' => $keyword,
                'pegawai.nik' => $keyword,
                'pegawai.npwp' => $keyword,
                'pegawai.sk_cpns' => $keyword,
                'pegawai.email_pegawai' => $keyword,
            ];
        }

        //end filter

        //pagination
        $data['pegawai'] = $this->pegawai->join('kategori', 'kategori.id_kategori = pegawai.kategori')->where($where)->like($like)->orLike($or_like)->orderBy('nama_pegawai', 'ASC')->paginate(25, 'pegawai');
        $data['jumlah'] = $this->pegawai->countAll();
        $data['pager'] = $this->pegawai->pager;
        return view('user/pegawai/list', $data);
    }

    //--------------------------------------------------------------------

}
