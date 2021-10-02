@extends('main')

@section('title') {{ __('labels.contact') }} @endsection

@section('content')
    <section class="contact wrapper">
        <div class="contact__form">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form class="row g-3" action="{{ route('app.contacts.store') }}" method="post">
                @csrf
                <h3 class="text-center fw-bold">{{ __('labels.getInTouch') }}</h3>
                <div class="col-sm-6">
                    <label for="contactBrand" class="form-label">{{ __('adverts.brand') }}</label>
                    <select name="contact[brand]" data-placeholder="{{ __('contacts.selectBrand') }}" id="contactBrand" class="form-select">
                        <option value="" selected disabled hidden></option>
                        @foreach($brands as $key => $brand)
                            <option value="{{ $brand['en'] }}" data-brand="{{ $key }}">
                                {{ $brand['en'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="contactModel" class="form-label">{{ __('contacts.model') }}</label>
                    <select name="contact[model]" disabled data-placeholder="{{ __('contacts.selectModel') }}" id="contactModel" class="form-select">
                        <option value="" selected disabled>{{ __('contacts.selectBrandFirst') }}</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="contactPrice" class="form-label">{{ __('contacts.price') }}</label>
                    <input type="text" id="contactPrice" class="form-control @error('contact.price') is-invalid @enderror" name="contact[price]"
                           value="{{ old('contact.price') }}"
                    />
                    @error('contact.price') @include('elements.errorMessage') @enderror
                </div>
                <div class="col-sm-6">
                    <label for="contactYear" class="form-label">{{ __('contacts.year') }}</label>
                    <input type="text" id="contactYear" class="form-control @error('contact.year') is-invalid @enderror" name="contact[year]"
                           value="{{ old('contact.year') }}"
                    />
                    @error('contact.year') @include('elements.errorMessage') @enderror
                </div>
                <div class="col-12">
                    <label for="contactName" class="form-label required-field">{{ __('contacts.name') }}</label>
                    <input type="text" id="contactName" class="form-control @error('contact.name') is-invalid @enderror" name="contact[name]" required
                           value="{{ old('contact.name') }}"
                    />
                    @error('contact.name') @include('elements.errorMessage') @enderror
                </div>
                <div class="col-md-6">
                    <label for="contactEmail" class="form-label required-field">{{ __('contacts.email') }}</label>
                    <input type="email" id="contactEmail" class="form-control @error('contact.email') is-invalid @enderror" name="contact[email]" required
                           value="{{ old('contact.email') }}"
                    />
                    @error('contact.email') @include('elements.errorMessage') @enderror
                </div>
                <div class="col-md-6">
                    <label for="contactPhone" class="form-label required-field">{{ __('contacts.phone') }}</label>
                    <input type="tel" id="contactPhone" class="form-control @error('contact.phone') is-invalid @enderror" name="contact[phone]" required
                           value="{{ old('contact.phone') }}"
                    />
                    @error('contact.phone') @include('elements.errorMessage') @enderror
                </div>
                <div class="col-12">
                    <label for="contactMessage" class="form-label">{{ __('contacts.message') }}</label>
                    <textarea class="form-control @error('contact.message') is-invalid @enderror" name="contact[message]" id="contactMessage" rows="3" maxlength="255">{{ old('contact.message') }}</textarea>
                    @error('contact.message') @include('elements.errorMessage') @enderror
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="button button--transparent button--transparent--success px-4 py-3">
                        <i class="far fa-paper-plane mr-1"></i>
                        {{ __('labels.send') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="contact__map">
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2715.4200210188237!2d27.547349051901705!3d47.11043947905274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafa65695769d3%3A0x5fac1e98aff019a!2sStr.%20Soarelui%2C%20Horpaz%20707313!5e0!3m2!1sro!2sro!4v1633171559386!5m2!1sro!2sro" width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/tail.select-default.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/contacts.css') }}" />
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/js/tail.select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bundle/js/pages/contact.js') }}"></script>
@endpush
