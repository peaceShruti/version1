<?php

namespace App\Filters;

use CodeIgniter\Filters\CSRF;

class CustomCSRF extends CSRF
{
    public function before(\CodeIgniter\HTTP\RequestInterface $request, $arguments = null)
    {
        // Define the routes that should be excluded from CSRF protection.
        $excludedRoutes = [
            'reliableverify/candidate-modal',
        ];

        // Check if the current route is in the excluded routes list.
        $currentRoute = $request->uri->getPath();
        
        if (in_array($currentRoute, $excludedRoutes)) {
            return $request;
        }

        // Continue with CSRF protection for other routes.
        return parent::before($request, $arguments);
    }
}
