<?php

namespace App\Observers;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactObserver
{
    /**
     * Handle the contact "created" event.
     * @param Contact $contact
     * @return void
     */
    public function created(Contact $contact): void
    {
        Mail::send('emails.contact', ['contact' => $contact], function($m) {
            $m->to('sales@metzcars.com', 'Contact METZ CARS')->subject('METZ CARS - Contact message received');
        });
    }
}
