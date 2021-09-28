<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsStoreRequest;
use App\Services\ContactsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function __construct(
        private ContactsService $contactService
    ) { }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $contacts = $this->contactService->getContacts();

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ContactsStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ContactsStoreRequest $request): RedirectResponse
    {
        return $this->contactService->handleStore($request);
    }
}
