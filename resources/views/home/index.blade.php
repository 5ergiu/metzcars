@extends('main')

@section('meta')
    <meta name="description" content="{{ __('labels.importOrStock') }}">
@endsection

@section('title') {{ __('labels.leasingAndRent') }} @endsection

@section('mainHeader')

@endsection

@section('content')
    <header class="intro position-relative d-flex justify-content-center align-items-end">
        <div class="intro__bg position-absolute w-100 h-100 top-0 start-0"></div>
        <div class="intro__txt p-5">
            <h1 class="fade-in-left text-center text-shadow fw-bold text-uppercase">
                {!! __('labels.importOrStock') !!}
            </h1>
        </div>
    </header>
    <section class="container">
        @if(!$specialOffer->isEmpty())
            <div class="text-center text-sm-start">
                <h3 class="title title--bordered">
                    <i class="fas fa-star color-orange"></i>
                    {{ __('labels.specialOffer') }}
                </h3>
            </div>
            @include('elements.advert', ['adverts' => $specialOffer, 'type' => 'stock'])
        @endif
        @if(!$stock->isEmpty())
            <div class="text-center text-sm-start">
                <h3 class="title title--bordered">
                    <a class="color-white" href="{{ route('stock.index') }}">
                        {{ __('labels.latestStock') }}
                    </a>
                </h3>
            </div>
            <div class="d-flex flex-column gap-3">
                @include('elements.advert', ['adverts' => $stock, 'type' => 'stock'])
            </div>
            <div class="text-center mt-3">
                <a class="btn btn-primary" href="{{ route('stock.index')  }}">
                    {{ __('labels.moreItems') }}
                </a>
            </div>
        @endif
        <div class="text-center text-sm-start">
            <h3 class="title title--bordered">
                <a class="color-white" href="{{ route('stock.index') }}">
                    {{ __('labels.portfolio') }}
                </a>
            </h3>
        </div>
        <div class="d-flex flex-wrap gap-3">
            @include('elements.advert', ['adverts' => $portfolio, 'type' => 'portfolio'])
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-primary" href="{{ route('portfolio.index')  }}">
                {{ __('labels.moreItems') }}
            </a>
        </div>
        <div class="my-5">
            <h4 class="title text-center mb-0">
                {{ __('labels.carNotFound') }}?
                <br />
                <a class="btn btn-light btn-light--success fs-4 mt-3" href="{{ route('contacts.create') }}">
                    {{ __('labels.contactUs') }}
                </a>
            </h4>
        </div>
    </section>
@endsection

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('bundle/css/pages/home.css') }}"
@endpush
