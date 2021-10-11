<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AutovitTranslationsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StockController extends Controller
{
    public function __construct(
        private AutovitTranslationsService $autovitTranslationsService,
    ) {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $adverts           = Advert::where('sold', false)->paginate(10);
        $translatedOptions = $this->autovitTranslationsService->getTranslatedOptions();
        $type              = 'stock';

        if ($request->ajax()) {
            return response()->json(['html' => view('elements.advert', compact('adverts', 'type', 'translatedOptions'))->render()]);
        }

        return view('stock.index', compact('adverts', 'translatedOptions'));
    }

    /**
     * Marks an advert as sold.
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function markAsSold(Advert $advert): RedirectResponse
    {
        $advert->update(['sold' => true, 'special_offer' => false]);

        return back()->with('success', __('adverts.messages.success'));
    }

    /**
     * Marks an advert as special offer.
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function markAsSpecialOffer(Advert $advert): RedirectResponse
    {
        $advert->update(['special_offer' => true]);

        return back()->with('success', __('adverts.messages.success'));
    }
}
