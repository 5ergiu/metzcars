<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AdvertsService;
use App\Services\AutovitTranslationsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StockController extends Controller
{
    public function __construct(
        private AdvertsService $advertsService,
        private AutovitTranslationsService $autovitTranslationsService
    ) { }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $adverts           = $this->advertsService->getFormattedAdvertsForStock($request->query('page'));
        $translatedOptions = $this->autovitTranslationsService->getTranslatedOptions();

        if ($request->ajax()) {
            return response()->json(['html' => view('elements.advert', compact('adverts', 'translatedOptions'))->render()]);
        }

        return view('stock.index', compact('adverts', 'translatedOptions'));
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
