<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthOperator implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        $role = session()->get('role');
        if ($role == 'siswa' or $role == 'guru' or $role == 'pegawai' or $role == 'alumni') {
            return redirect()->to(base_url('user/dashboard'));
        } else if ($role == 'pimpinan') {
            return redirect()->to(base_url('pimpinan/dashboard'));
        }
    }
}
