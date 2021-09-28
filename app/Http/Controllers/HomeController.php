<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of resources.
     * @return View
     */
    public function index(): View
    {
        return view('home.index');
    }
}
