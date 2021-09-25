<?php

namespace App\Services;

use App\Http\Requests\ContactStoreRequest;
use Illuminate\Http\RedirectResponse;

class ContactService
{
    /**
     * @param ContactStoreRequest $request
     * @return RedirectResponse
     */
    public function handleStore(ContactStoreRequest $request): RedirectResponse
    {
        dd($request);
    }
}
