<?php

namespace App\Services;

use App\Http\Requests\AdvertUpdateStoreRequest;
use App\Models\Advert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class PortfolioService
{

    /**
     * Store a newly created resource in storage.
     * @param AdvertUpdateStoreRequest $request
     * @return RedirectResponse
     */
    public function handleStore(AdvertUpdateStoreRequest $request): RedirectResponse
    {
        try {
            $advert = Advert::create($this->evaluateRequest($request));

            return redirect()->route('portfolio.show', $advert);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
        }

        return redirect()
            ->back()
            ->withErrors(['advert' => __('labels.genericError')])
        ;
    }

    /**
     * Update the specified resource in storage.
     * @param AdvertUpdateStoreRequest $request
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function handleUpdate(AdvertUpdateStoreRequest $request, Advert $advert): RedirectResponse
    {
        try {
            $advert->update($this->evaluateRequest($request));

            return redirect()->route('portfolio.show', $advert);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
        }

        return redirect()
            ->back()
            ->withErrors(['advert' => __('labels.genericError')])
        ;
    }

    /**
     * Delete the model from the database.
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function handleDestroy(Advert $advert): RedirectResponse
    {
        try {
            $advert->delete();

            return redirect()->route('portfolio.index')
                ->with('success', __('adverts.messages.delete'))
            ;
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
        }

        return redirect()
            ->back()
            ->withErrors(['advert' => __('labels.genericError')])
        ;
    }

    /**
     * @param AdvertUpdateStoreRequest $request
     * @return array
     */
    private function evaluateRequest(AdvertUpdateStoreRequest $request): array
    {
        $advert = $request->get('advert');

        $advert['deductible_vat']  = $request->has('advert.deductible_vat');
        $advert['invoice_issued']  = $request->has('advert.invoice_issued');
        $advert['particle_filter'] = $request->has('advert.particle_filter');
        $advert['registered']      = $request->has('advert.registered');
        $advert['original_owner']  = $request->has('advert.original_owner');
        $advert['no_accident']     = $request->has('advert.no_accident');
        $advert['service_record']  = $request->has('advert.service_record');

        foreach ($advert['features'] as $feature => $key) {
            if ($key === '0') unset($advert['features'][$feature]);
        }

        $advert['features'] = array_keys($advert['features']);

        return $advert;
    }
}
