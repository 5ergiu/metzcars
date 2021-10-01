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
            $m->to('contact.metzcars@gmail.com', 'Contact Metz Cars')->subject('METZ CARS - Contact message received');
        });
    }
}
