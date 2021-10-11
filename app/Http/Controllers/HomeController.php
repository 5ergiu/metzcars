<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AutovitTranslationsService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private AutovitTranslationsService $autovitTranslationsService,
    ) { }

    /**
     * Display a listing of resources.
     * @return View
     */
    public function index(): View
    {
        $specialOffer      = Advert::where('special_offer', true)->get();
        $stock             = Advert::where([['sold', false], ['special_offer', false]])->orderBy('id', 'desc')->limit(3)->get();
        $portfolio         = Advert::where('sold', true)->orderBy('id', 'asc')->limit(3)->get();
        $translatedOptions = $this->autovitTranslationsService->getTranslatedOptions();

        return view('home.index', compact('specialOffer', 'stock', 'portfolio', 'translatedOptions'));
    }
}
