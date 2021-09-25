@extends('layout')

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
                    <label for="contactMessage" class="form-label required-field">{{ __('contacts.message') }}</label>
                    <textarea class="form-control @error('contact.message') is-invalid @enderror" name="contact[message]" id="contactMessage" rows="3" required>{{ old('contact.message') }}</textarea>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10851.038518945876!2d27.577520900197104!3d47.162561956068444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb79c6f212ff%3A0x978b132df6b21796!2zQ2VudHJ1LCBJYciZaQ!5e0!3m2!1sen!2sro!4v1632580257602!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/contacts.css') }}"
@endpush
