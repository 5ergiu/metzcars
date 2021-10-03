@foreach($adverts as $advert)
    <div class="advert card mb-3">
        <div class="row g-0">
            <div
                class="col-12 col-md-3 advert__img"
                title="{{ $advert['title'] }}"
                onclick="window.open('{{ $advert['url'] }}', '_blank')"
                style="background: no-repeat center url({{ $advert['photos']['1']['1280x800'] }}); background-size: cover"
            ></div>
            <div class="col-12 col-md-9">
                <div class="d-flex flex-column p-4 h-100">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <a href="{{ $advert['url'] }}" target="_blank" class="advert__title">{{ $advert['title'] }}</a>
                        <p class="text-nowrap fs-2 fw-bold">{{ number_format($advert['params']['price']['1'] * 1.19) }} €</p>
                    </div>
                    <div class="advert__details py-4 flex-grow-1 d-flex flex-wrap flex-md-column justify-content-md-evenly">
                        <ul class="d-flex flex-column flex-md-row">
                            <li class="me-3 fs-5 text-nowrap">
                                <i class="far fa-calendar-alt"></i>
                                {{ $advert['params']['year'] }}
                            </li>
                            <li class="me-3 fs-5 text-nowrap">
                                <i class="fas fa-road"></i>
                                {{ $advert['params']['mileage'] }} km
                            </li>
                            <li class="me-3 fs-5 text-nowrap">
                                <i class="fas fa-globe-europe"></i>
                                {{ str_replace('-', ' ', Str::of($advert['params']['pollution_standard'])->ucfirst()) }}
                            </li>
                            <li class="me-3 fs-5 text-nowrap">
                                <i class="fas fa-cog"></i>
                                {{ str_replace('-', ' ', Str::of($advert['params']['gearbox'])->ucfirst()) }}
                            </li>
                        </ul>
                        <ul class="d-flex flex-column flex-md-row">
                            <li class="me-3 fs-5 text-nowrap">
                                <i class="fas fa-horse-head"></i>
                                {{ $advert['params']['engine_power'] }} {{ __('adverts.hp') }}
                            </li>
                            <li class="me-3 fs-5 text-nowrap">
                                <i class="fas fa-cube"></i>
                                {{ $advert['params']['engine_capacity'] }} cm <sup>3</sup>
                            </li>
                            <li class="me-3 fs-5 text-nowrap">
                                <i class="fas fa-gas-pump"></i>
                                {{ str_replace('-', ' ', Str::of($advert['params']['fuel_type'])->ucfirst()) }}
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-end mt-auto">
                        <p class="flex-grow-1 fw-bold">
                            <small class="text-muted">{{ $advert['city']['ro'] }}, </small>
                            <small class="text-muted">{{ date('d M Y', strtotime($advert['created_at'])) }}</small>
                        </p>
                        <a class="advert__autovit" href="{{ $advert['url'] }}" target="_blank">
                            <img src="{{ asset('static/autovit.svg') }}" alt="AUTOVIT.RO" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
