@extends('main')

@section('title') {{ __('labels.stock') }} @endsection

@section('content')
    <section class="stock wrapper wrapper--load-more">
        @include('elements.advertBig', $adverts)
    </section>
    @include('elements.loader')
@endsection
