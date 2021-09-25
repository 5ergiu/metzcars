<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LegalController extends Controller
{
    /**
     * @return View
     */
    public function terms(): View
    {
        return view('legal.terms');
    }

    /**
     * @return View
     */
    public function privacy(): View
    {
        return view('legal.privacy');
    }
}
