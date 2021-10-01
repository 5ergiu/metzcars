Hi, a new contact message has been received:

<p>Name: {{ $contact->name }}</p>
<p>
    Email:
    <a href="mailto:{{ $contact->email }}" target="_top">
        {{ $contact->email }}
    </a>
<p>
    Phone:
    <a href="tel:{{ $contact->phone }}">
        {{ $contact->phone }}
    </a>
</p>
<p>Brand: {{ $contact->brand }}</p>
<p>Model: {{ $contact->model }}</p>
<p>Gearbox: {{ $contact->gearbox }}</p>
<p>Price: {{ $contact->price }}</p>
<p>Year: {{ $contact->year }}</p>
<p>Message: {{ $contact->message }}</p>
