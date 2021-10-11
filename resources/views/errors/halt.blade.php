@extends('main')

@section('content')
    <section class="container d-flex flex-column justify-content-center">
        <div class="text-center">
            <h1 class="text-warning m-3">
                <i class="fas fa-exclamation-triangle text-warning"></i> Oops!
            </h1>
            <h6>Something went wrong.<br/>We will work on fixing that right away.</h6>
        </div>
        @if(!empty($error))
            <div class="text-start">
                <p>Message: {{ $error->getMessage() }}</p>
                <p>File: {{ $error->getFile() }}</p>
                <p>Line: {{ $error->getLine() }}</p>
            </div>
        @endif
    </section>
@endsection
