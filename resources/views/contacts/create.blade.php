@extends('main')

@section('meta')
    <meta name="description" content="{{ __('labels.carNotFound') . ' - ' . __('labels.getInTouch') . ' - ' . config('app.name') }}">
@endsection

@section('title') {{ __('labels.contact') }} @endsection

@section('content')
    <section class="contact container">
        <div class="dark col-lg-7 mx-auto py-4">
            <h3 class="text-center">
                {{ __('labels.carNotFound') }}?
            </h3>
            <h5 class="text-center mb-4">
                {{ __('labels.callUsAt') }}
                <a href="tel:+40 726 205 206">
                    +40 726 205 206
                </a>
                <br />
                {{ __('labels.orSendUs') }}:
            </h5>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form class="needs-validation" action="{{ route('contacts.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <label for="contactBrand" class="form-label">{{ __('adverts.brand') }}</label>
                        <select name="contact[brand]" id="contactBrand" class="form-control select2">
                            <option value="" selected>{{ __('contacts.selectBrand') }}</option>
                            @foreach($brands as $key => $brand)
                                <option value="{{ $brand['en'] }}" data-brand="{{ $key }}">
                                    {{ $brand['en'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label for="contactModel" class="form-label">{{ __('adverts.model') }}</label>
                        <select name="contact[model]" id="contactModel" class="form-select select2">
                            <option value="" selected disabled>{{ __('contacts.selectBrandFirst') }}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-floating mb-4">
                            <input type="text" id="contactMaxPrice" class="form-control @error('contact.max_price') is-invalid @enderror" name="contact[max_price]"
                                   value="{{ old('contact.max_price') }}"
                                   placeholder="{{ __('contacts.maxPrice')  }}"
                            />
                            <label for="contactMaxPrice">{{ __('contacts.maxPrice') }}</label>
                            @error('contact.max_price') @include('elements.errorMessage') @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-4">
                            <input type="text" id="contactFromYear" class="form-control @error('contact.from_year') is-invalid @enderror" name="contact[from_year]"
                                   value="{{ old('contact.from_year') }}"
                                   placeholder="{{ __('contacts.fromYear') }}"
                            />
                            <label for="contactFromYear">{{ __('contacts.fromYear') }}</label>
                            @error('contact.from_year') @include('elements.errorMessage') @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-4">
                            <input type="text" id="contactName" class="form-control @error('contact.name') is-invalid @enderror" name="contact[name]" required
                                   value="{{ old('contact.name') }}"
                                   placeholder="{{ __('contacts.name') }}"
                            />
                            <label for="contactName" class="form-label required-field">{{ __('contacts.name') }}</label>
                            @error('contact.name') @include('elements.errorMessage') @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-floating mb-4">
                            <input type="email" id="contactEmail" class="form-control @error('contact.email') is-invalid @enderror" name="contact[email]" required
                                   value="{{ old('contact.email') }}"
                                   placeholder="{{ __('contacts.email') }}"
                            />
                            <label for="contactEmail" class="form-label required-field">{{ __('contacts.email') }}</label>
                            @error('contact.email') @include('elements.errorMessage') @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-floating mb-4">
                            <input type="tel" id="contactPhone" class="form-control @error('contact.phone') is-invalid @enderror" name="contact[phone]" required
                                   value="{{ old('contact.phone') }}"
                                   placeholder="{{ __('contacts.phone') }}"
                            />
                            <label for="contactPhone" class="form-label required-field">{{ __('contacts.phone') }}</label>
                            @error('contact.phone') @include('elements.errorMessage') @enderror
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-4">
                    <textarea class="form-control @error('contact.message') is-invalid @enderror" placeholder="{{ __('contacts.otherOptions') }}..." name="contact[message]" id="contactMessage" maxlength="255" style="height: 150px">{{ old('contact.message') }}</textarea>
                    <label for="contactMessage" class="form-label">{{ __('contacts.otherOptions') }}</label>
                    @error('contact.message') @include('elements.errorMessage') @enderror
                </div>
                <div class="col-12 text-center">
                    @include('elements.buttonLoading', [
                        'type'  => 'submit',
                        'class' => 'btn-light btn-light--success',
                        'icon'  => 'far fa-paper-plane me-1',
                        'text'  => 'actions.send',
                    ])
{{--                    <button type="submit" class="btn btn-light--success">--}}
{{--                        <i class="far fa-paper-plane me-1"></i>--}}
{{--                        {{ __('actions.send') }}--}}
{{--                    </button>--}}
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
    <link type="text/css" rel="stylesheet" href="{{ asset('bundle/css/pages/contacts.css') }}"
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bundle/js/pages/contacts.js') }}"></script>
@endpush
