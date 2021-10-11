@extends('main')

@section('meta')
    <meta name="description" content="{{ config('app.name') . ' - ' . __('labels.stock') }}">
@endsection

@section('title') {{ __('labels.stock') }} @endsection

@section('content')
    <section class="container">
        <h3 class="title text-center">
            @if($adverts->isEmpty())
                {{ __('labels.noStock') }}
                <br />
                <a class="btn btn-light btn-light--success fs-4 mt-3" href="{{ route('contacts.create') }}">
                    {{ __('labels.contactUs') }}
                </a>
            @else
                {{ __('labels.stock') }}
            @endif
        </h3>
        <div class="adverts-wrapper d-flex flex-column gap-3">
            @include('elements.advert', ['type' => 'stock'])
        </div>
        @if(!$adverts->isEmpty())
            <div id="loader" class="text-center mt-3">
                <p class="d-none fs-4 fw-bold color-orange">{{ __('labels.noMoreData') }}</p>
                @include('elements.buttonLoading', [
                    'type'  => 'button',
                    'class' => 'btn-light btn-light--success',
                    'text'  => 'actions.loadMore',
                ])
            </div>
        @endif
    </section>
@endsection

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('bundle/css/pages/stock.css') }}"
@endpush
