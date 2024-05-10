<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();

        // Check if the user is not logged in
        if (!$session->has('id012')) {
            // Debugging: Output session data to logs
            log_message('debug', 'Session data: ' . print_r($session->get(), true));

            return redirect()->to('/login'); // Redirect to login page
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing after the request
    }
}
