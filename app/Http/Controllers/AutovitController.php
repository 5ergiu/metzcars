<?php

namespace App\Http\Controllers;

use App\Services\AutovitService;
use Illuminate\Http\JsonResponse;

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

    /**
     * Get all gearboxes for a specific model.
     * @param string $brand
     * @param string $model
     * @return string
     */
    public function getModelGearboxes(string $brand, string $model): string
    {
        return $this->autovitService->getModelGearboxes($brand, $model);
    }
}
