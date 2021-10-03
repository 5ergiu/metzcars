@extends('main')

@section('meta')
    <meta name="description" content="{{ config('app.name') . ' - ' . __('labels.stock') }}">
@endsection

@section('title') {{ __('labels.stock') }} @endsection

@section('content')
    <section class="stock wrapper wrapper--load-more">
        @include('elements.advertBig', $adverts)
    </section>
    @include('elements.loader')
@endsection
