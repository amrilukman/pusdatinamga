<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use App\Models\PegawaiModel;
use App\Models\AlumniModel;
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
        $this->user = new UserModel();
        $this->perubahan = new PerubahanModel();
        $this->guru = new GuruModel();
        $this->siswa = new SIswaModel();
        $this->pegawai = new PegawaiModel();
        $this->alumni = new AlumniModel();
    }

    public function index($id)
    {
        $data['data'] = $this->perubahan->join('user', 'user.nik = perubahan.nik')->find($id);

        return view('operator/perubahan/detail', $data);
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

    public function approve($id)
    {
        $this->perubahan->update($id, [
            'status' => 'approved',
            'tgl_selesai' => date("Y-m-d"),
        ]);

        session()->setFlashdata('message', 'Berhasil Mengubah Data');
        return redirect()->to('/operator/dashboard');
    }

    public function reject($id)
    {
        $this->perubahan->update($id, [
            'status' => 'rejected',
            'tgl_selesai' => date("Y-m-d"),
        ]);

        session()->setFlashdata('message', 'Berhasil Mengubah Data');
        return redirect()->to('/operator/dashboard');
    }

    public function edit($id)
    {
        $user = $this->perubahan->join('user', 'user.nik = perubahan.nik')->find($id);
        if (!empty($this->guru->where('nik', $user->nik)->first())) {
            return redirect()->to('/operator/guru/edit/' . $user->nik . '');
        } else if (!empty($this->pegawai->where('nik', $user->nik)->first())) {
            return redirect()->to('/operator/pegawai/edit/' . $user->nik . '');
        } else if (!empty($this->siswa->where('nik', $user->nik)->first())) {
            return redirect()->to('/operator/siswa/edit/' . $user->nomor_induk . '');
        } else if (!empty($this->alumni->where('nik', $user->nik)->first())) {
            return redirect()->to('/operator/alumni/edit/' . $user->nomor_induk . '');
        }
    }
}
