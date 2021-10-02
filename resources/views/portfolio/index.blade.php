@extends('main')

@section('title') {{ __('labels.portfolio') }} @endsection

@section('content')
    <section class="portfolio wrapper wrapper--load-more">
        <div class="d-flex flex-wrap justify-content-evenly">
            @include('elements.portfolio_advert', $adverts)
        </div>
    </section>
   @include('elements.loader')
@endsection
