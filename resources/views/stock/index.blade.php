@extends('main')

@section('meta')
    <meta name="description" content="{{ config('app.name') . ' - ' . __('labels.stock') }}">
@endsection

@section('title') {{ __('labels.stock') }} @endsection

@section('content')
    <section class="container">
        <div class="adverts-wrapper d-flex flex-column gap-3">
            @include('elements.advert', ['type' => 'stock'])
        </div>
        <div id="loader" class="text-center mt-3">
            <p class="d-none fs-4 fw-bold color-orange">{{ __('labels.noMoreData') }}</p>
            @include('elements.buttonLoading', [
                'type'  => 'button',
                'class' => 'btn-light btn-light--success',
                'text'  => 'actions.loadMore',
            ])
        </div>
    </section>
@endsection

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('bundle/css/pages/stock.css') }}"
@endpush
