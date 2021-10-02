<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AdvertsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __construct(
        private AdvertsService $advertsService
    ) { }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $adverts = Advert::paginate(10);

        if ($request->ajax()) {
            return response()->json(['html' => view('elements.portfolio_advert', compact('adverts'))->render()]);
        }

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
