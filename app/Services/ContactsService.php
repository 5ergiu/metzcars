<?php

namespace App\Services;

use App\Http\Requests\ContactsStoreRequest;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactsService
{
    /**
     * @param ContactsStoreRequest $request
     * @return RedirectResponse
     */
    public function handleStore(ContactsStoreRequest $request): RedirectResponse
    {
        try {
            Contact::create($request->get('contact'));

            return redirect()
                ->route('app.contacts.create')
                ->with('success', __('contacts.thankYouMessage'))
            ;
        } catch (Throwable $e) {
            Log::error($e->getMessage(), ['class' => __CLASS__, 'method' => __FUNCTION__]);
        }

        return redirect()
            ->back()
            ->withErrors(['contact' => __('labels.genericError')])
        ;
    }
}
