@extends('layouts.secondary')


@section('header')
    <h1 class="text-warning text-center m-3">
        <i class="fas fa-exclamation-triangle text-warning"></i> Oops!
    </h1>
    <h6 class="text-center">Something went wrong.<br/>We will work on fixing that right away.</h6>
@endsection

@section('content')
    @if(!empty($error))
        <p>Message: {{ $error->getMessage() }}</p>
        <p>File: {{ $error->getFile() }}</p>
        <p>Line: {{ $error->getLine() }}</p>
    @endif
@endsection
