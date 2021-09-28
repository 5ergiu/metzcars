@extends('main')

@section('title') {{ __('labels.stock') }} @endsection

@section('content')
    <section class="stock wrapper">
        @include('elements.advert', $adverts)
    </section>
    <div id="loader" class="text-center">
        <p class="d-none text-warning">{{ __('adverts.noData') }}</p>
        <button class="button button--transparent button--transparent--success">
            {{ __('adverts.loadData') }}
        </button>
        <div class="spinner-border mt-3 d-none" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection
