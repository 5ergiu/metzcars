<?php

namespace App\Http\Controllers;

use App\Services\AdvertsService;
use App\Services\AutovitService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AutovitController extends Controller
{
    public function __construct(
        private AutovitService $autovitService,
        private AdvertsService $advertsService
    ) {
        $this->middleware('auth')->except('getBrandModels');
    }

    /**
     * Get all models for a specific brand.
     * @param string $brand
     * @return JsonResponse
     */
    public function getBrandModels(string $brand): JsonResponse
    {
        $models = [];

        $options = json_decode($this->autovitService->getBrandModels($brand), true)['options'];

        foreach ($options as $key => $option) {
            $models[] = [
                'id'   => $key,
                'text' => $option['en'],
            ];
        }

        return response()->json($models);
    }

    /**
     * Manually updating stock.
     * @return RedirectResponse
     */
    public function updateStock(): RedirectResponse
    {
        $this->advertsService->updatePortfolio();

        return back()->with('success', __('adverts.messages.success'));
    }
}
