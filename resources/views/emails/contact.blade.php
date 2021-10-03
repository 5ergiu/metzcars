Hi, a new contact message has been received:

<p>{{ __('contacts.name') }}: {{ $contact->name }}</p>
<p>
    {{ __('contacts.email') }}:
    <a href="mailto:{{ $contact->email }}" target="_top">
        {{ $contact->email }}
    </a>
<p>
    {{ __('contacts.phone') }}:
    <a href="tel:{{ $contact->phone }}">
        {{ $contact->phone }}
    </a>
</p>
<p>{{ __('adverts.brand') }}: {{ $contact->brand }}</p>
<p>{{ __('adverts.model') }}: {{ $contact->model }}</p>
<p>{{ __('contacts.maxPrice') }}: {{ $contact->max_price }}</p>
<p>{{ __('contacts.fromYear') }}: {{ $contact->from_year }}</p>
<p>{{ __('contacts.message') }}: {{ $contact->message }}</p>
