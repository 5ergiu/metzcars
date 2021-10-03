@extends('main')

@section('meta')
    <meta name="description" content="{{ __('home.importOrStock') }}">
@endsection

@section('title') {{ __('labels.leasingAndRent') }} @endsection

@section('content')
    <section class="home">
        <div class="home__bg">
            <div class="home__bg_img"></div>
            <div class="home__bg_txt fade-in-left">
                <h1 class="text-center fw-bold text-uppercase">{{ __('home.importOrStock') }}</h1>
            </div>
        </div>
        <div class="home wrapper">
            <div>
                <div class="text-center text-sm-start">
                    <h6 class="title title--bordered">{{ __('home.latestStock') }}</h6>
                </div>
                @include('elements.advertBig', ['adverts' => $stock])
                <div class="d-flex justify-content-center my-5">
                    <div class="link-goto">
                        <a class="link-goto__anchor" href="{{ route('app.stock.index')  }}">
                            {{ __('labels.moreItems') }}
                        </a>
                        <div class="link-goto__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                                <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="text-center text-sm-start">
                    <h6 class="title title--bordered">{{ __('labels.portfolio') }}</h6>
                </div>
                <div class="d-flex flex-wrap justify-content-xl-between gap-3">
                    @include('elements.advertSmall', ['adverts' => $portfolio])
                </div>
                <div class="d-flex justify-content-center my-5">
                    <div class="link-goto">
                        <a class="link-goto__anchor" href="{{ route('app.portfolio.index')  }}">
                            {{ __('labels.moreItems') }}
                        </a>
                        <div class="link-goto__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                                <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-5">
                <h4 class="title text-center mb-0">
                    {{ __('home.carNotFound') }} ?
                    <br />
                    <button class="button button--transparent fs-3 mt-4 p-4">
                        <a href="{{ route('app.contacts.create') }}">
                            {{ __('home.contactUs') }}
                        </a>
                    </button>
                </h4>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/home.css') }}"
@endpush
