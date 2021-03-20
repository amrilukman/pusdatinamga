<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthUser implements FilterInterface
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
        if ($role == 'pimpinan') {
            return redirect()->to(base_url('pimpinan/dashboard'));
        } else if ($role == 'operator') {
            return redirect()->to(base_url('operator/dashboard'));
        }
    }
}
