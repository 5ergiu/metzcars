@extends('main')

@section('title') {{ __('labels.contact') }} @endsection

@section('content')
    <section class="contact-admin container">
        <h3 class="title text-center">
            {{ __('labels.contacts') }}
        </h3>
        <table class="table table-dark table-responsive">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('contacts.name') }}</th>
                <th scope="col" class="d-none d-md-table-cell">{{ __('contacts.phone') }}</th>
                <th scope="col" class="d-none d-md-table-cell">{{ __('contacts.email') }}</th>
                <th scope="col" class="text-end">{{ __('contacts.message') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $key => $contact)
                <tr>
                    <td>{{ $key + $contacts->firstitem() }}</td>
                    <td>{{ $contact->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $contact->phone }}</td>
                    <td class="d-none d-md-table-cell">{{ $contact->email }}</td>
                    <td class="text-end">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-toggle="modal"
                            data-bs-target="#messageModal"
                            data-bs-from="{{ __('contacts.messageFrom', ['name' => $contact->name]) }}"
                            data-bs-phone="{{ $contact->phone }}"
                            data-bs-email="{{ $contact->email }}"
                            data-bs-brand="{{ $contact->brand }}"
                            data-bs-model="{{ $contact->model }}"
                            data-bs-max-price="{{ $contact->max_price }}"
                            data-bs-from-year="{{ $contact->from_year }}"
                            data-bs-message="{{ $contact->message }}"
                        >
                            {{ __('contacts.viewMessage') }}
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $contacts->links() !!}
        </div>
        <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h5 class="modal-title__from mb-2"></h5>
                            <a href="#" class="modal-title__phone d-block"></a>
                            <a href="#" class="modal-title__email d-block" target="_top"></a>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-body__brand"></p>
                        <p class="modal-body__model"></p>
                        <p class="modal-body__max-price"></p>
                        <p class="modal-body__from-year"></p>
                        <p class="modal-body__message mt-4"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('bundle/css/pages/contacts.css') }}"
@endpush

@push('scripts')
    <script defer>
        let messageModal = document.getElementById('messageModal')

        messageModal.addEventListener('show.bs.modal', (e) => {
            let button = e.relatedTarget
            messageModal.querySelector('.modal-title__from').textContent = button.getAttribute('data-bs-from')
            messageModal.querySelector('.modal-title__phone').textContent = "{{ __('contacts.phone') . ': ' }}" + button.getAttribute('data-bs-phone')
            messageModal.querySelector('.modal-title__phone').href = 'tel:' + button.getAttribute('data-bs-phone')
            messageModal.querySelector('.modal-title__email').textContent = "{{ __('contacts.email') . ': ' }}" + button.getAttribute('data-bs-email')
            messageModal.querySelector('.modal-title__email').href = 'mailto:' + button.getAttribute('data-bs-email')
            messageModal.querySelector('.modal-body__brand').textContent = "{{ __('adverts.brand') . ': ' }}" + button.getAttribute('data-bs-brand')
            messageModal.querySelector('.modal-body__model').textContent = "{{ __('adverts.model') . ': ' }}" + button.getAttribute('data-bs-model')
            messageModal.querySelector('.modal-body__max-price').textContent = "{{ __('contacts.maxPrice') . ': ' }}" + button.getAttribute('data-bs-max-price')
            messageModal.querySelector('.modal-body__from-year').textContent = "{{ __('contacts.fromYear') . ': ' }}" + button.getAttribute('data-bs-from-year')
            messageModal.querySelector('.modal-body__message').textContent = button.getAttribute('data-bs-message')
        })
    </script>
@endpush
