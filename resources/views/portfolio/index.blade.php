@extends('main')

@section('meta')
    <meta name="description" content="{{ config('app.name') . ' - ' . __('labels.portfolio') }}">
@endsection

@section('title') {{ __('labels.portfolio') }} @endsection

@section('content')
    <section class="container">
        <div class="d-flex flex-wrap justify-content-center">
            @include('elements.advert')
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
