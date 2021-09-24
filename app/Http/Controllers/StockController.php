<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StockController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('stock.stock');
    }
}
