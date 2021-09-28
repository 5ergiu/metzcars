<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AutovitService;
use Illuminate\View\View;

class StockController extends Controller
{
   public function __construct(
       private AutovitService $autovitService
   ) { }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('stock.index');
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
