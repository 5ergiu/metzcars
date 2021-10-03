@extends('main')

@section('title') {{ __('labels.portfolio') }} @endsection

@section('content')
    <section class="portfolio wrapper wrapper--load-more">
        <div class="d-flex flex-wrap justify-content-xl-between gap-3">
            @include('elements.advertSmall', $adverts)
        </div>
    </section>
   @include('elements.loader')
@endsection
