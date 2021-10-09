@extends('main')

@section('meta')
    <meta name="description" content="{{ config('app.name') . ' - ' . __('labels.stock') }}">
@endsection

@section('title') {{ __('labels.stock') }} @endsection

@section('content')
    <section class="container">
        @include('elements.advert')
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
    <link type="text/css" rel="stylesheet" href="{{ asset('bundle/css/pages/stock.css') }}"
@endpush
