<?php

namespace App\Http\Controllers;

use App\Exceptions\HaltException;
use App\Models\Advert;
use App\Services\AutovitService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StockController extends Controller
{
    public function __construct(
        private AutovitService $autovitService
    ) { }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $adverts = $this->autovitService->getActiveAdverts($request->query('page'));

        if ($request->ajax()) {
            return response()->json(['html' => view('elements.advert', compact('adverts'))->render()]);
        }

        return view('stock.index', compact('adverts'));
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
