<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('contact.index');
    }
}
