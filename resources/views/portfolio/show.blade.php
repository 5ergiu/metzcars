@extends('main')

@section('meta')
    <meta name="description" content="{{ $advert->title }}">
@endsection

@section('title') {{ $advert->title }} @endsection

@section('content')
    <section class="portfolio-show container">
        <h2 class="title text-center">{{ $advert->title }}</h2>
        <div class="d-flex flex-column flex-xl-row justify-content-xl-between">
            <div class="col-xl-8 me-xl-3">
                <h3 class="title title--bordered">{{ __('portfolio.details') }}</h3>
                <ul class="portfolio-show__details dark my-0 list-unstyled">
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.brand') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->brand }}
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
                    @if(!empty($advert->generation))
                        <li class="row">
                        <span class="col-6">
                            {{ __('adverts.generation') }}
                        </span>
                            <span class="col-6">
                            {{ $advert->generation }}
                        </span>
                        </li>
                    @endif
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
                            {{ $translatedOptions['fuelTypeOptions'][$advert->fuel_type] }}
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
                    @if(!empty($advert->transmission))
                        <li class="row">
                        <span class="col-6">
                            {{ __('adverts.transmission') }}
                        </span>
                            <span class="col-6">
                            {{ $translatedOptions['transmissionOptions'][$advert->transmission] }}
                        </span>
                        </li>
                    @endif
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.gearbox') }}
                        </span>
                        <span class="col-6">
                            {{ $translatedOptions['gearboxOptions'][$advert->gearbox] }}
                        </span>
                    </li>
                    @if(!empty($advert->pollition_standard))
                        <li class="row">
                        <span class="col-6">
                            {{ __('adverts.pollutionStandard') }}
                        </span>
                            <span class="col-6">
                            {{ $advert->pollution_standard }}
                        </span>
                        </li>
                    @endif
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.originalOwner') }}
                        </span>
                        <span class="col-6">
                            {{ $advert->original_owner ? __('labels.yes') : __('labels.no') }}
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.particleFilter') }}
                        </span>
                        <span class="col-6">
                            <i class="fas {{ $advert->particle_filter ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
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
                            {{ $translatedOptions['bodyTypeOptions'][$advert->body_type] }}
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
                    @if(!empty($advert->co2_emissions))
                        <li class="row">
                        <span class="col-6">
                            {{ __('adverts.co2Emissions') }}
                        </span>
                            <span class="col-6">
                            {{ $advert->co2_emissions . ' g/km' }}
                        </span>
                        </li>
                    @endif
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
                            {{ $translatedOptions['colorOptions'][$advert->color] }}
                        </span>
                    </li>
                    @if(!empty($advert->color_type))
                        <li class="row">
                        <span class="col-6">
                            {{ __('adverts.colorType') }}
                        </span>
                            <span class="col-6">
                            {{ $translatedOptions['colorTypeOptions'][$advert->color_type] ?? '' }}
                        </span>
                        </li>
                    @endif
                    @if(!empty($advert->registration_date))
                        <li class="row">
                        <span class="col-6">
                            {{ __('adverts.registrationDate') }}
                        </span>
                            <span class="col-6">
                            {{ date('d/m/Y', strtotime($advert->registration_date)) }}
                        </span>
                        </li>
                    @endif
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.registered') }}
                        </span>
                        <span class="col-6">
                             <i class="fas {{ $advert->registered ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.noAccident') }}
                        </span>
                        <span class="col-6">
                            <i class="fas {{ $advert->no_accident ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
                        </span>
                    </li>
                    <li class="row">
                        <span class="col-6">
                            {{ __('adverts.serviceRecord') }}
                        </span>
                        <span class="col-6">
                             <i class="fas {{ $advert->service_record ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
                        </span>
                    </li>
                </ul>
                @if(!empty($advert->description))
                    <h3 class="title title--bordered">{{ __('portfolio.description') }}</h3>
                    <div class="dark my-0">
                        {!! nl2br($advert->description) !!}
                    </div>
                @endif
                <h3 class="title title--bordered">{{ __('adverts.features') }}</h3>
                <ul class="portfolio-show__features dark my-0 list-unstyled">
                    @foreach($advert->features as $key => $feature)
                        <li>
                            <i class="far fa-check-circle color-green"></i>
                            {{ $translatedOptions['featureOptions'][$feature] }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="portfolio-show__gallery col">
                <h3 class="title title--bordered">
                    {{ __('portfolio.gallery') }}
                    <a class="fs-3 fw-bold" onclick="Spotlight.show(document.getElementsByClassName('spotlight'))">
                        {{ __('portfolio.pictures', ['number' => count(Storage::files("images/$advert->directory"))]) }}
                    </a>
                </h3>
                <div class="spotlight-group d-flex flex-wrap justify-content-xxl-center align-items-center" data-infinite="true" data-download="true" data-autofit="false" data-autohide="false">
                    @foreach(Storage::files("images/$advert->directory") as $key => $file)
                        <a class="spotlight me-1 mb-1 {{ $key > 5 ? 'd-none' : '' }}" href="{{ asset("storage/images/$advert->directory/" . substr($file, strrpos($file, '/') + 1)) }}">
                            <img src="{{ asset("storage/images/$advert->directory/thumbs/" . substr($file, strrpos($file, '/') + 1)) }}" alt="" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('bundle/css/pages/portfolio.css') }}"
@endpush
