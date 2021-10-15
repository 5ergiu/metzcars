@foreach($adverts as $advert)
    <div class="advert {{ 'advert--' . $type }} dark p-0">
        <div class="position-relative">
            <div
                class="advert__img"
                title="{{ $advert->title }}"
                onclick="window.open('{{ route('portfolio.show', $advert) }}', '_self')"
                style="background: no-repeat center url({{ asset("storage/images/$advert->directory/1.jpeg") }}); background-size: cover"
            ></div>
        @auth
            <a class="advert__edit btn btn-warning position-absolute" href="{{ route('portfolio.edit', $advert) }}">
                <i class="fas fa-pencil-alt"></i>
                {{ __('actions.edit') }}
            </a>
            @if(empty($advert->sold) && ($advert->canBeSpecial() || !empty($advert->special_offer)))
                <form class="advert__toggle-special-offer position-absolute" action="{{ route('stock.special', $advert) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light" title="{{ __('actions.markAsSpecialOffer') }}">
                        @if(empty($advert->special_offer && $advert->canBeSpecial()))
                            <i class="fas fa-star color-orange"></i>
                        @endif
                        {{ empty($advert->special_offer && $advert->canBeSpecial()) ? __('actions.markAsSpecialOffer') : __('actions.unMarkAsSpecialOffer') }}
                    </button>
                </form>
            @endif
            <form class="advert__toggle-sold position-absolute" action="{{ route('stock.sold', $advert) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light btn-light--success" title="{{ __('actions.markAsSold') }}">
                    @if(empty($advert->sold))
                        <i class="fas fa-money-bill-wave"></i>
                    @endif
                    {{ empty($advert->sold) ? __('actions.markAsSold') : __('actions.unMarkAsSold') }}
                </button>
            </form>
        @endauth
        </div>
        <div class="flex-grow-1 d-flex flex-column p-3">
            <h5 class="mb-0">
                <a href="{{ route('portfolio.show', $advert) }}" class="advert__title">
                    {{ $advert->title }}
                </a>
            </h5>
            <div class="d-flex justify-content-between align-items-center my-3">
                @if($advert->sold)
                    <span class="badge badge-danger p-2 fs-5 mb-1">
                        {{ __('labels.confPrice') }}
                    </span>
                @else
                    <a class="btn btn-secondary py-1 px-2 lh-1" href="{{ $advert->url }}" target="_blank">
                        {{ __('labels.checkoutTheAdd') }}
                        <br />
                        <img src="{{ asset('static/autovit.svg') }}" alt="AUTOVIT.RO" width="120px" />
                    </a>
                    <p class="color-green fs-4 fw-bold text-nowrap">
                        <i class="fas fa-euro-sign"></i>
                        {{ $advert->price }}
                    </p>
                @endif
            </div>
            @if($advert->special_offer || $advert->deductible_vat || $advert->incoive_issued || $advert->no_accident || $advert->service_record)
                <div class="d-flex flex-wrap gap-2 mb-2">
                    @if($advert->special_offer)
                        <span class="badge">
                            <i class="fas fa-star color-orange align-text-bottom"></i>
                            <span class="align-bottom">
                                {{ __('labels.specialOffer') }}
                            </span>
                        </span>
                    @endif
                    @if($advert->deductible_vat)
                        <span class="badge badge-success">
                            {{ __('adverts.deductibleVat') }}
                        </span>
                    @endif
                    @if($advert->invoice_issued)
                        <span class="badge badge-success">
                            {{ __('adverts.invoiceIssued') }}
                        </span>
                    @endif
                    @if($advert->no_accident)
                        <span class="badge badge-success">
                            {{ __('adverts.noAccident') }}
                        </span>
                    @endif
                    @if($advert->service_record)
                        <span class="badge badge-success">
                            {{ __('adverts.serviceRecord') }}
                        </span>
                    @endif
                </div>
            @endif
            <div class="advert__specifications mt-auto">
                <ul class="mb-0">
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
