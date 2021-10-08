<?php

namespace App\Http\Controllers;

use App\Services\AutovitService;
use App\Services\LocaleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;

class AutovitController extends Controller
{
    public function __construct(
        private AutovitService $autovitService
    ) { }

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
     * Get all generations for a specific model.
     * @param string $brand
     * @param string $model
     * @return JsonResponse
     */
    public function getModelGenerations(string $brand, string $model): JsonResponse
    {
        $generations  = [];

        $options = json_decode($this->autovitService->getModelGenerations($brand, $model), true)['options'];

        foreach ($options as $option) {
            $generations[] = [
                'id'   => $option['en'],
                'text' => $option['en'],
            ];
        }

        return response()->json($generations);
    }
}
