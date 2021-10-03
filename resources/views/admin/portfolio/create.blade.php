@extends('main')

@section('title') {{ __('labels.addToPortfolio') }} @endsection

@section('content')
    <section class="contacts wrapper">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form class="row g-3" action="{{ route('admin.portfolio.store') }}" method="post">
            @csrf
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
                <label for="contactModel" class="form-label">{{ __('adverts.model') }}</label>
                <select name="contact[model]" disabled data-placeholder="{{ __('contacts.selectModel') }}" id="contactModel" class="form-select">
                    <option value="" selected disabled>{{ __('contacts.selectBrandFirst') }}</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="contactMaxPrice" class="form-label">{{ __('contacts.maxPrice') }}</label>
                <input type="text" id="contactMaxPrice" class="form-control @error('contact.max_price') is-invalid @enderror" name="contact[max_price]"
                       value="{{ old('contact.max_price') }}"
                />
                @error('contact.max_price') @include('elements.errorMessage') @enderror
            </div>
            <div class="col-sm-6">
                <label for="contactFromYear" class="form-label">{{ __('contacts.fromYear') }}</label>
                <input type="text" id="contactFromYear" class="form-control @error('contact.from_year') is-invalid @enderror" name="contact[from_year]"
                       value="{{ old('contact.from_year') }}"
                />
                @error('contact.from_year') @include('elements.errorMessage') @enderror
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
                <textarea class="form-control @error('contact.message') is-invalid @enderror" placeholder="{{ __('contacts.otherOptions') }}..." name="contact[message]" id="contactMessage" rows="3" maxlength="255">{{ old('contact.message') }}</textarea>
                @error('contact.message') @include('elements.errorMessage') @enderror
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="button button--transparent button--transparent--success px-4 py-3">
                    <i class="far fa-paper-plane mr-1"></i>
                    {{ __('labels.send') }}
                </button>
            </div>
        </form>
    </section>
@endsection
