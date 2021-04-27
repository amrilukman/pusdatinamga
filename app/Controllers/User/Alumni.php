<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AlumniModel;
use App\Models\JurusanModel;
use App\Models\UserModel;

class Alumni extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $alumni;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->alumni = new AlumniModel();
        $this->jurusan = new JurusanModel();
        $this->user = new UserModel();
    }

    public function index()
    {
        $jurusan = $this->request->getGet('jurusan');
        $rombel = $this->request->getGet('rombel');
        $tahun_lulus = $this->request->getGet('tahun_lulus');
        $keyword = $this->request->getGet('keyword');

        $data['jurusan'] = $jurusan;
        $data['rombel'] = $rombel;
        $data['tahun_lulus'] = $tahun_lulus;
        $data['keyword'] = $keyword;

        //dropdown
        $jurusans = $this->jurusan->notLike('id_jurusan', 10)->findAll();
        $data['jurusans'] = ['' => 'Semua jurusan'] + array_column($jurusans, 'nama_jurusan', 'id_jurusan');

        if ($jurusan == 1) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'];
        } elseif ($jurusan == 2) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'] + [4 => '4'];
        } elseif ($jurusan == 3) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 4) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 5) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'];
        } elseif ($jurusan == 6) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'];
        } elseif ($jurusan == 7) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 8) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'];
        } elseif ($jurusan == 9) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } else {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        }

        $data['tahun_luluss'] = ['' => 'Tahun']
            + [2004 => '2004'] + [2005 => '2005'] + [2006 => '2006']
            + [2007 => '2007'] + [2008 => '2008'] + [2009 => '2009']
            + [2010 => '2010'] + [2011 => '2011'] + [2012 => '2012']
            + [2013 => '2013'] + [2014 => '2014'] + [2015 => '2015']
            + [2016 => '2016'] + [2017 => '2017'] + [2018 => '2018']
            + [2019 => '2019'] + [2020 => '2020'] + [2021 => '2021'];

        //filter
        $wherejurusan = [];
        $whererombel = [];
        $wheretahun_lulus = [];
        $like = [];
        $or_like = [];

        if (!empty($jurusan)) {
            $wherejurusan = ['alumni.jurusan' => $jurusan];
        }

        if (!empty($rombel)) {
            $whererombel = ['alumni.rombel' => $rombel];
        }

        if (!empty($tahun_lulus)) {
            $wheretahun_lulus = ['alumni.tahun_lulus' => $tahun_lulus];
        }

        if (!empty($keyword)) {
            $like = ['alumni.nama_alumni' => $keyword];
            $or_like = [
                'alumni.nisn' => $keyword,
                'alumni.nik' => $keyword,
                'alumni.email_alumni' => $keyword,
            ];
        }
        //end filter

        //pagination
        $data['alumni'] = $this->alumni->join('jurusan', 'jurusan.id_jurusan = alumni.jurusan')->where($wherejurusan)->where($whererombel)->where($wheretahun_lulus)->like($like)->orLike($or_like)->orderBy('nama_alumni', 'ASC')->paginate(25, 'alumni');
        $data['jumlah'] = $this->alumni->countAll();
        $data['pager'] = $this->alumni->pager;
        return view('user/alumni/list', $data);
    }
}
