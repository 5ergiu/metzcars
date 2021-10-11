<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PricesController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('prices.index');
    }
}
