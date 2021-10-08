<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AutovitService;
use App\Services\AutovitTranslationsService;
use App\Services\PortfolioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __construct(
        private AutovitService $autovitService,
        private AutovitTranslationsService $autovitTranslationsService,
        private PortfolioService $portfolioService
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
            return response()->json(['html' => view('elements.advert', compact('adverts'))->render()]);
        }

        return view('portfolio.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $brands                   = json_decode($this->autovitService->getBrands(), true)['options'];
        $fuelTypeOptions          = $this->autovitTranslationsService::getFuelTypeOptions();
        $gearboxOptions           = $this->autovitTranslationsService::getGearboxOptions();
        $bodyTypeOptions          = $this->autovitTranslationsService::getBodyTypeOptions();
        $colorOptions             = $this->autovitTranslationsService::getColorOptions();
        $colorTypeOptions         = $this->autovitTranslationsService::getColorTypeOptions();
        $transmissionOptions      = $this->autovitTranslationsService::getTransmissionOptions();
        $pollutionStandardOptions = $this->autovitTranslationsService::getPollutionStandardOptions();
        $featureOptions           = $this->autovitTranslationsService::getFeatureOptions();

        return view('admin.portfolio.create',
            compact(
                'brands',
                'fuelTypeOptions',
                'gearboxOptions',
                'bodyTypeOptions',
                'colorOptions',
                'colorTypeOptions',
                'transmissionOptions',
                'pollutionStandardOptions',
                'featureOptions',
            )
        );
    }

    /**
     * Display the specified resource.
     * @param Advert $advert
     * @return View
     */
    public function show(Advert $advert): View
    {
        return view(
            'portfolio.show',
            compact('advert')
        );
    }
}
