<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AutovitService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private AutovitService $autovitService,
    ) { }

    /**
     * Display a listing of resources.
     * @return View
     */
    public function index(): View
    {
        $portfolio = Advert::limit(3)->get();
        $stock     = $this->autovitService->getActiveAdverts(null, 3);

        return view('home.index', compact('stock', 'portfolio'));
    }
}
