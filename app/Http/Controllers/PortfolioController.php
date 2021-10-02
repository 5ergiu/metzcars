<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AdvertsService;
use Illuminate\Support\Facades\Storage;
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
        $adverts = Advert::paginate(10);
//        $adverts1 = Advert::find(7045985411);
//        $adverts2 = Advert::find(7045985411);
//        $adverts3 = Advert::find(7045985411);
//        $adverts4 = Advert::find(7045985411);
//        $adverts5 = Advert::find(7045985411);
//        $adverts6 = Advert::find(7045985411);
//        $adverts7 = Advert::find(7045985411);
//        $adverts = [$adverts1, $adverts2, $adverts3,$adverts4,$adverts5,$adverts6,$adverts7];

        return view('portfolio.index', compact('adverts'));
    }

    /**
     * Display the specified resource.
     * @param Advert $advert
     * @return View
     */
    public function show(Advert $advert): View
    {
        return view(
            'portfolio.details',
            compact('advert')
        );
    }
}
