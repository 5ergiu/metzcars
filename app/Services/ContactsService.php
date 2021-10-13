<?php

namespace App\Services;

use App\Helpers\LoggerHelper;
use App\Http\Requests\ContactsStoreRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
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
                ->route('contacts.create')
                ->with('success', __('contacts.thankYouMessage'))
            ;
        } catch (Throwable $e) {
            new LoggerHelper($e);
        }

        return redirect()
            ->back()
            ->withErrors(['contact' => __('labels.genericError')])
        ;
    }
}
