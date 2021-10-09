<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertUpdateStoreRequest;
use App\Http\Requests\ContactsStoreRequest;
use App\Http\Requests\UploadImagesRequest;
use App\Models\Advert;
use App\Services\AutovitService;
use App\Services\AutovitTranslationsService;
use App\Services\PortfolioService;
use App\Services\UploadsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __construct(
        private AutovitService $autovitService,
        private AutovitTranslationsService $autovitTranslationsService,
        private PortfolioService $portfolioService,
        private UploadsService $uploadsService
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
        $translatedOptions        = $this->autovitTranslationsService->getTranslatedOptions();
        $pollutionStandardOptions = $this->autovitTranslationsService::getPollutionStandardOptions();

        return view('admin.portfolio.change', compact('brands', 'translatedOptions', 'pollutionStandardOptions'));
    }

    /**
     * Display the specified resource.
     * @param Advert $advert
     * @return View
     */
    public function show(Advert $advert): View
    {
        $translatedOptions = $this->autovitTranslationsService->getTranslatedOptions();

        return view(
            'portfolio.show',
            compact('advert', 'translatedOptions')
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param AdvertUpdateStoreRequest $request
     * @return RedirectResponse
     */
    public function store(AdvertUpdateStoreRequest $request): RedirectResponse
    {
        return $this->portfolioService->handleStore($request);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Advert $advert
     * @return View
     */
    public function edit(Advert $advert): View
    {
        $brands                   = json_decode($this->autovitService->getBrands(), true)['options'];
        $models                   = json_decode($this->autovitService->getBrandModels(Str::kebab($advert->brand)), true)['options'];
        $translatedOptions        = $this->autovitTranslationsService->getTranslatedOptions();
        $pollutionStandardOptions = $this->autovitTranslationsService::getPollutionStandardOptions();

        return view('admin.portfolio.change', compact('translatedOptions', 'advert', 'brands', 'models', 'pollutionStandardOptions'));
    }

    /**
     * Update the specified resource in storage.
     * @param AdvertUpdateStoreRequest $request
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function update(AdvertUpdateStoreRequest $request, Advert $advert): RedirectResponse
    {
        return $this->portfolioService->handleUpdate($request, $advert);
    }

    /**
     * Uploads advert photos.
     * @param UploadImagesRequest $request
     * @return JsonResponse
     */
    public function upload(UploadImagesRequest $request): JsonResponse
    {
        return $this->uploadsService->handleImagesUpload($request);
    }
}
