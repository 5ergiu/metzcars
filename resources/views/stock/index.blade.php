@extends('main')

@section('title') {{ __('labels.stock') }} @endsection

@section('content')
    <section class="stock wrapper wrapper--load-more">
        @include('elements.advert', $adverts)
    </section>
    @include('elements.loader')
@endsection
