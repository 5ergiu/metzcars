@extends('main')

@section('meta')
    <meta name="description" content="{{ config('app.name') . ' - ' . __('labels.portfolio') }}">
@endsection

@section('title') {{ __('labels.portfolio') }} @endsection

@section('content')
    <section class="container">
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($adverts as $advert)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="d-flex flex-column mx-2 h-100">
                        @include('elements.advert')
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <div id="loader" class="text-center">
        <p class="d-none fs-4 fw-bold color-orange">{{ __('labels.noMoreData') }}</p>
        @include('elements.buttonLoading', [
            'type'  => 'button',
            'class' => 'btn-light btn-light--success',
            'text'  => 'actions.loadMore',
        ])
    </div>
@endsection

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('bundle/css/pages/portfolio.css') }}"
@endpush
