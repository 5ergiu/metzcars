@foreach($adverts as $advert)
    <div class="advert advert--portfolio card m-3">
        <div
            class="advert--portfolio__img"
            title="{{ $advert->title }}"
            onclick="window.open('{{ route('app.portfolio.show', $advert) }}', '_self')"
            style="background: no-repeat center url({{ asset("storage/images/$advert->autovit_id/1.jpeg") }}); background-size: cover"
        ></div>
        <div class="card-body">
            <a href="{{ route('app.portfolio.show', $advert) }}" class="advert__title">{{ $advert->title }}</a>
            <div class="d-flex mt-3">
                <ul class="d-flex flex-column mb-0">
                    <li class="me-3 fs-5 text-nowrap">
                        <i class="far fa-calendar-alt"></i>
                        {{ $advert->year }}
                    </li>
                    <li class="me-3 fs-5 text-nowrap">
                        <i class="fas fa-road"></i>
                        {{ $advert->mileage }} km
                    </li>
                    <li class="me-3 fs-5 text-nowrap">
                        <i class="fas fa-globe-europe"></i>
                        {{ str_replace('-', ' ', Str::of($advert->pollution_standard)->ucfirst()) }}
                    </li>
                    <li class="me-3 fs-5 text-nowrap">
                        <i class="fas fa-cog"></i>
                        {{ str_replace('-', ' ', Str::of($advert->gearbox)->ucfirst()) }}
                    </li>
                </ul>
                <ul class="d-flex flex-column">
                    <li class="me-3 fs-5 text-nowrap">
                        <i class="fas fa-horse-head"></i>
                        {{ $advert->engine_power }} {{ __('adverts.hp') }}
                    </li>
                    <li class="me-3 fs-5 text-nowrap">
                        <i class="fas fa-cube"></i>
                        {{ $advert->engine_capacity }} cm <sup>3</sup>
                    </li>
                    <li class="me-3 fs-5 text-nowrap">
                        <i class="fas fa-gas-pump"></i>
                        {{ str_replace('-', ' ', Str::of($advert->fuel_type)->ucfirst()) }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
