<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('portfolio.portfolio');
    }
}
