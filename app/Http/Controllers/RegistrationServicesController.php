<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class RegistrationServicesController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('registrationServices.index');
    }
}
