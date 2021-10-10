@foreach($adverts as $advert)
    <div class="advert dark p-0">
        <div class="position-relative">
            <div
                class="advert__img"
                title="{{ $advert->title }}"
                onclick="window.open('{{ !empty($advert->id) && $advert->sold ? route('portfolio.show', ['advert' => $advert]) : $advert->url }}', '_self')"
                style="background: no-repeat center url({{ $advert->autovit_id ? "$advert->autovit_photo" : asset("storage/images/$advert->directory/1.jpeg") }}); background-size: cover"
            ></div>
        @auth
            @if(!empty($advert->id))
                <a class="advert__edit btn btn-warning position-absolute" href="{{ route('portfolio.edit', $advert) }}">
                    <i class="fas fa-pencil-alt"></i>
                    {{ __('actions.edit') }}
                </a>
            @endif
            @if(!$advert->special_offer)
                <button class="advert__special-offer btn btn-light position-absolute">
                    <i class="fas fa-star color-orange"></i>
                    {{ __('actions.specialOffer') }}
                </button>
            @endif
            @if(!$advert->sold)
                <button class="advert__mark-as-sold btn btn-light btn-light--success position-absolute">
                    <i class="fas fa-money-bill-wave"></i>
                    {{ __('actions.sold') }}
                </button>
            @endif
        @endauth
        </div>
        <div class="flex-grow-1 d-flex flex-column p-3">
            <h5 class="mb-0">
                <a href="{{ (!empty($advert->id) && $advert->sold) ? route('portfolio.show', $advert) : $advert->url }}" target="{{ empty($advert->id) ? '_black' : '_self' }}" class="advert__title">{{ $advert->title }}</a>
            </h5>
            @if(!empty($advert->price))
                <div class="d-flex justify-content-between align-items-center my-2">
                    <p class="advert__price {{ $advert->sold ? 'advert__price--sold' : '' }} color-green fs-4 fw-bold text-nowrap ms-md-1">
                        <i class="fas fa-euro-sign"></i>
                        {{ number_format($advert->price * 1.19) }}
                    </p>
                    @if(!empty($advert->url))
                        <a class="btn btn-secondary py-1 px-2 lh-1" href="{{ $advert->url }}" target="_blank">
                            {{ __('labels.checkoutTheAdd') }}
                            <br />
                            <img src="{{ asset('static/autovit.svg') }}" alt="AUTOVIT.RO" width="120px" />
                        </a>
                    @endif
                </div>
            @endif
            @if($advert->special_offer || $advert->deductible_vat || $advert->incoive_issued || $advert->sold)
                <div class="advert__labels d-flex flex-wrap mb-2">
                    @if($advert->sold)
                        <div class="advert_labels_conf-price">
                            <span class="badge badge-danger me-2">
                                {{ __('labels.confPrice') }}
                            </span>
                        </div>
                    @endif
                    @if($advert->special_offer)
                        <span class="badge me-2">
                            <i class="fas fa-star color-orange"></i>
                            {{ __('actions.specialOffer') }}
                        </span>
                    @endif
                    @if($advert->deductible_vat)
                        <span class="badge badge-success me-2">
                            {{ __('adverts.deductibleVat') }}
                        </span>
                    @endif
                    @if($advert->invoice_issued)
                        <span class="badge badge-success me-2">
                            {{ __('adverts.invoiceIssued') }}
                        </span>
                    @endif
                </div>
            @endif
            <div class="advert__specifications mt-auto">
                <ul class="mb-0 d-md-flex flex-wrap">
                    <li class="text-nowrap">
                        <i class="far fa-calendar-alt"></i>
                        {{ $advert->year }}
                    </li>
                    <li class="text-nowrap">
                        <i class="fas fa-road"></i>
                        {{ $advert->mileage }} km
                    </li>
                    <li class="text-nowrap">
                        <i class="fas fa-globe-europe"></i>
                        {{ $advert->pollution_standard }}
                    </li>
                    <li class="text-nowrap">
                        <i class="fas fa-cog"></i>
                        {{ $translatedOptions['gearboxOptions'][$advert->gearbox] }}
                    </li>
                    <li class="text-nowrap">
                        <i class="fas fa-horse-head"></i>
                        {{ $advert->engine_power }}
                        {{ __('adverts.hp') }}
                    </li>
                    <li class="text-nowrap">
                        <i class="fas fa-cube"></i>
                        {{ $advert->engine_capacity }} cm <sup>3</sup>
                    </li>
                    <li class="text-nowrap">
                        <i class="fas fa-gas-pump"></i>
                        {{ $translatedOptions['fuelTypeOptions'][$advert->fuel_type] }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
