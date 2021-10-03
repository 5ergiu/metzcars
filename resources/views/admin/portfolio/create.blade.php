@extends('main')

@section('title') {{ __('labels.addToPortfolio') }} @endsection

@section('content')
    <section class="contacts wrapper">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form class="row g-3" action="{{ route('admin.portfolio.store') }}" method="post">
            @csrf

            <div class="col-12 text-center">
                <button type="submit" class="button button--transparent button--transparent--success px-4 py-3">
                    Submit
                </button>
            </div>
        </form>
    </section>
@endsection
