<?php

namespace App\Services;

use App\Http\Requests\ContactsStoreRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactsService
{
    /**
     * @return LengthAwarePaginator
     */
    public function getContacts(): LengthAwarePaginator
    {
        return Contact::paginate(10);
    }

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
            Log::error($e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
        }

        return redirect()
            ->back()
            ->withErrors(['contact' => __('labels.genericError')])
        ;
    }
}
