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
                    <div class="d-flex align-items-center mb-3">
                        <a href="{{ $advert['url'] }}" target="_blank" class="advert__title">{{ $advert['title'] }}</a>
                        <div class="advert__price">
                            <p class="">{{ $advert['params']['price']['1'] }} €</p>
                            <small class="text-muted fw-bold">{{ __('adverts.priceNoVat') }}</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-end mt-auto">
                        <p class="card-text flex-grow-1 fw-bold">
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
