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
            // key, value, group, selected, disabled, description, rebuild
            $models[] = [
                'key' => $key,
                'value' => $option['en'],
                'group' => false,
                'selected' => false,
                'disabled' => false,
                'description' => '',
                'rebuild' => true,
            ];
        }

        return response()->json($models);
    }
}
