<?php

namespace App\Services;

use App\Http\Requests\AdvertStoreRequest;
use App\Models\Advert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class PortfolioService
{

    /**
     * @param AdvertStoreRequest $request
     * @return RedirectResponse
     */
    public function handleStore(AdvertStoreRequest $request): RedirectResponse
    {
        $advert = $request->get('advert');

        $advert['features'] = json_encode($advert['features']);

        try {
            $advert = Advert::create($request->get('advert'));

            return redirect()->route('portfolio.show', $advert);
        } catch (Throwable $e) {
            Log::error($e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
        }

        return redirect()
            ->back()
            ->withErrors(['advert' => __('labels.genericError')])
        ;
    }
}
