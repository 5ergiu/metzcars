@extends('main')

@section('meta')
    <meta name="description" content="{{ $advert->title }}">
@endsection

@section('title') {{ $advert->title }} @endsection

@section('content')
    <section class="portfolio wrapper">
        <h2 class="title text-center">{{ $advert->title }}</h2>
        <div class="d-flex flex-column flex-xl-row justify-content-xl-between">
            <div class="col-xl-7">
                <h3 class="title title--bordered">{{ __('portfolio.details') }}</h3>
                <ul class="list-unstyled">
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.brand') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->make }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.model') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->model }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.version') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->version }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.generation') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->generation }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.year') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->year }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.mileage') }}
                        </span>
                        <span class="col-6">
                            {{  $advert->mileage }} km
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.fuelType') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->fuel_type }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.power') }}
                        </span>
                        <span class="col-6">
                            {{  $advert->engine_power . " " . __('adverts.hp') }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.engineCapacity') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->engine_capacity }} cm <sup>3</sup>
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.transmission') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->transmission }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.gearbox') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->gearbox }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.pollutionStandard') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->pollution_standard }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.particleFilter') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->particle_filter ? __('labels.yes') : __('labels.no') }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.urbanConsumption') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->urban_consumption . ' l/100 km' }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.bodyType') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->body_type }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.vin') }}
                        </span>
                        <span class="col-6">
                            {{  $advert->vin }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.co2Emissions') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->co2_emissions . ' g/km' }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.doorCount') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->door_count }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.color') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->color }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.colorType') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->color_type }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.dateRegistration') }}
                        </span>
                        <span class="col-6">
                            {{ date('d/m/Y', strtotime($advert->date_registration)) }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.registered') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->registered ? __('labels.yes') : __('labels.no') }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.noAccident') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->no_accident ? __('labels.yes') : __('labels.no') }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.serviceRecord') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->service_record ? __('labels.yes') : __('labels.no') }}
                        </span>
                    </li>
                </ul>
                <h3 class="title title--bordered">{{ __('portfolio.features') }}</h3>
                <ul class="list-unstyled">
                    @foreach($advert->features as $feature)
                        <li>
                            <i class="far fa-check-circle"></i>
                            {{ str_replace('-', ' ', Str::of($feature)->ucfirst()) }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="portfolio__gallery col">
                <h3 class="title title--bordered">{{ __('portfolio.gallery') }}</h3>
                <span class="fw-bold">({{ __('portfolio.pictures', ['number' => count(Storage::files("images/$advert->autovit_id"))]) }})</span>
                <div class="spotlight-group d-flex flex-wrap align-items-center" data-infinite="true" data-download="true" data-autofit="false" data-autohide="false">
                    @foreach(Storage::files("images/$advert->autovit_id") as $key => $file)
                        <a class="spotlight m-2 {{ $key > 5 ? 'd-none' : '' }}" href="{{ asset("storage/images/$advert->autovit_id/" . substr($file, strrpos($file, '/') + 1)) }}">
                            <img src="{{ asset("storage/images/$advert->autovit_id/thumbs/" . substr($file, strrpos($file, '/') + 1)) }}" alt="" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/portfolio.css') }}"
@endpush
