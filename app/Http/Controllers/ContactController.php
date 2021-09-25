<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Services\ContactService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(
        private ContactService $contactService
    ) {}

    /**
     * @return View
     */
    public function create(): View
    {
        return view('contact.contact');
    }

    /**
     * @param ContactStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ContactStoreRequest $request): RedirectResponse
    {
        return $this->contactService->handleStore($request);
    }
}
