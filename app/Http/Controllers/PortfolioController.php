<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AdvertsService;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __construct(
        private AdvertsService $advertsService
    ) { }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        return view('portfolio.index');
    }

    /**
     * Display the specified resource.
     * @param Advert $advert
     * @return View
     */
    public function show(Advert $advert): View
    {
        return view(
            'partials.adverts.details',
            compact('advert')
        );
    }
}
