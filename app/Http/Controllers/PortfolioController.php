<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertStoreRequest;
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
        $translatedOptions        = $this->autovitTranslationsService->getTranslatedOptions();
        $pollutionStandardOptions = $this->autovitTranslationsService::getPollutionStandardOptions();

        return view(
            'portfolio.show',
            compact('advert', 'translatedOptions', 'pollutionStandardOptions')
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param AdvertStoreRequest $request
     * @return RedirectResponse
     */
    public function store(AdvertStoreRequest $request): RedirectResponse
    {
        dd($request->all());
        return $this->portfolioService->handleStore($request);
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
