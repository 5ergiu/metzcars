@extends('main')

@section('title') {{ __('labels.addToPortfolio') }} @endsection

@section('content')
    <section class="portfolio-create container">
        <h3 class="text-center">{{ __('labels.addToPortfolio') }}</h3>
        <form class="needs-validation dark" action="{{ route('portfolio.store') }}" method="post">
            @csrf
            <input type="hidden" name="advert[sold]" value="1" />
            <div class="row mb-4 align-items-center">
                <div class="col-12 col-lg">
                    <div class="form-floating">
                        <input type="text" id="advertTitle" class="form-control @error('advert.title') is-invalid @enderror" name="advert[title]" required
                               value="{{ $advert->title ?? old('advert.title') }}"
                               placeholder="{{ __('adverts.title') }}"
                        />
                        <label for="advertTitle" class="form-label required-field">{{ __('adverts.title') }}</label>
                        @error('advert.title') @include('elements.errorMessage') @enderror
                    </div>
                </div>
                <div class="col-auto mt-4 mt-lg-0">
                    <button type="button" class="btn btn-primary" id="toggleUppyModal">
                        <i class="fas fa-camera"></i>
                        {{ __('actions.addPhotos') }}
                    </button>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-5 col-md-4 col-lg-3 mb-3 mb-md-0 align-self-end">
                    <div class="form-floating">
                        <input type="text" id="advertYear" class="form-control @error('advert.year') is-invalid @enderror" name="advert[year]" required
                               value="{{ $advert->year ?? old('advert.year') }}"
                               placeholder="{{ __('adverts.year') }}"
                        />
                        <label for="advertYear" class="form-label mb-0 required-field">{{ __('adverts.year') }}</label>
                        @error('advert.year') @include('elements.errorMessage') @enderror
                    </div>
                </div>
                <div class="row col-md-8 col-lg-9 pe-0">
                    <div class="col-md-6 pe-0 mb-3 mb-md-0">
                        <label for="selectBrand" class="form-label required-field">{{ __('adverts.brand') }}</label>
                        <select name="advert[brand]" id="selectBrand" class="form-control select2" required>
                            <option value="" selected>{{ __('labels.selectBrand') }}</option>
                            @foreach($brands as $key => $brand)
                                <option value="{{ $brand['en'] }}" {{ ($advert->brand ?? null) == $brand['en'] ? 'selected' : '' }} data-brand="{{ $key }}">
                                    {{ $brand['en'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6 pe-0">
                        <label for="selectModel" class="form-label required-field">{{ __('adverts.model') }}</label>
                        <select name="advert[model]" id="selectModel" class="form-select select2" required>
                            @if(!empty($advert))
                                @foreach($models as $id => $model)
                                    <option value="{{ $id }}" {{ ($advert->model ?? null) == $model ? 'selected' : '' }} data-model="{{ $id }}">
                                        {{ $model }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" selected disabled>{{ __('labels.selectBrandFirst') }}</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="form-floating">
                        <input type="text" id="advertVersion" class="form-control @error('advert.version') is-invalid @enderror" name="advert[version]" required
                               value="{{ $advert->version ?? old('advert.version') }}"
                               placeholder="{{ __('adverts.mileage') }}"
                        />
                        <label for="advertVersion" class="form-label required-field">{{ __('adverts.version') }}</label>
                        @error('advert.version') @include('elements.errorMessage') @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="form-floating">
                        <input type="text" id="advertGeneration" class="form-control @error('advert.generation') is-invalid @enderror" name="advert[generation]"
                               value="{{ $advert->generation ?? old('advert.generation') }}"
                               placeholder="{{ __('adverts.mileage') }}"
                        />
                        <label for="advertGeneration" class="form-label">{{ __('adverts.generation') }}</label>
                        @error('advert.generation') @include('elements.errorMessage') @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="form-floating">
                        <input type="text" id="advertVin" class="form-control @error('advert.door_count') is-invalid @enderror" name="advert[vin]" required
                               value="{{ $advert->vin ?? old('advert.vin') }}"
                               placeholder="{{ __('adverts.vin') }}"
                        />
                        <label for="advertVin" class="form-label required-field">{{ __('adverts.vin') }}</label>
                        @error('advert.vin') @include('elements.errorMessage') @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <label for="advertFuelType" class="form-label required-field">{{ __('adverts.fuelType') }}</label>
                    <select name="advert[fuel_type]" id="advertFuelType" class="form-select">
                        <option value="" selected></option>
                        @foreach($translatedOptions['fuelTypeOptions'] as $key => $fuelType)
                            <option value="{{ $key }}" {{ ($advert->fuel_type ?? null) == $key ? 'selected' : '' }}>
                                {{ $fuelType }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 align-self-end mb-4 mb-md-0">
                    <div class="form-floating">
                        <input type="text" id="advertEnginePower" class="form-control pe-4 @error('advert.engine_power') is-invalid @enderror" name="advert[engine_power]" required
                               value="{{ $advert->engine_power ?? old('advert.engine_power') }}"
                               placeholder="{{ __('adverts.enginePower') }}"
                        />
                        <span class="position-absolute top-0 end-0 mt-3 me-3">{{ __('adverts.hp') }}</span>
                        <label for="advertEnginePower" class="form-label required-field">{{ __('adverts.enginePower') }}</label>
                        @error('advert.engine_power') @include('elements.errorMessage') @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4 align-self-end">
                    <div class="form-floating">
                        <input type="text" id="advertEngineCapacity" class="form-control pe-4 @error('advert.engine_capacity') is-invalid @enderror" name="advert[engine_capacity]" required
                               value="{{ $advert->engine_capacity ?? old('advert.engine_capacity') }}"
                               placeholder="{{ __('adverts.engineCapacity') }}"
                        />
                        <span class="position-absolute top-0 end-0 mt-3 me-3">cm<sup>3</sup></span>
                        <label for="advertEngineCapacity" class="form-label required-field">{{ __('adverts.engineCapacity') }}</label>
                        @error('advert.engine_capacity') @include('elements.errorMessage') @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <label for="advertGearbox" class="form-label required-field">{{ __('adverts.gearbox') }}</label>
                    <select name="advert[gearbox]" id="advertGearbox" class="form-select" required>
                        <option value="" selected></option>
                        @foreach($translatedOptions['gearboxOptions'] as $key => $gearbox)
                            <option value="{{ $key }}" {{ ($advert->gearbox ?? null) == $key ? 'selected' : '' }}>
                                {{ $gearbox }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 align-self-end mb-4 mb-md-0">
                    <div class="form-floating">
                        <input type="text" id="advertMileage" class="form-control pe-4 @error('advert.mileage') is-invalid @enderror" name="advert[mileage]" required
                               value="{{ $advert->mileage ?? old('advert.mileage') }}"
                               placeholder="{{ __('adverts.mileage') }}"
                        />
                        <span class="position-absolute top-0 end-0 mt-3 me-3">Km</span>
                        <label for="advertMileage" class="form-label required-field">{{ __('adverts.mileage') }}</label>
                        @error('advert.mileage') @include('elements.errorMessage') @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4 align-self-end">
                    <div class="form-floating">
                        <input type="text" id="advertDoorCount" class="form-control @error('advert.door_count') is-invalid @enderror" name="advert[door_count]" required
                               value="{{ $advert->door_count ?? old('advert.door_count') }}"
                               placeholder="{{ __('adverts.doorCount') }}"
                        />
                        <label for="advertDoorCount" class="form-label required-field">{{ __('adverts.doorCount') }}</label>
                        @error('advert.door_count') @include('elements.errorMessage') @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <label for="advertBodyType" class="form-label required-field">{{ __('adverts.bodyType') }}</label>
                    <select name="advert[body_type]" id="advertBodyType" class="form-select" required>
                        <option value="" selected></option>
                        @foreach($translatedOptions['bodyTypeOptions'] as $key => $bodyType)
                            <option value="{{ $key }}" {{ ($advert->body_type ?? null) == $key ? 'selected' : '' }}>
                                {{ $bodyType }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <label for="advertTransmission" class="form-label">{{ __('adverts.transmission') }}</label>
                    <select name="advert[transmission]" id="advertTransmission" class="form-select">
                        <option value="" selected></option>
                        @foreach($translatedOptions['transmissionOptions'] as $key => $transmission)
                            <option value="{{ $key }}" {{ ($advert->transmission ?? null) == $key ? 'selected' : '' }}>
                                {{ $transmission }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="advertRegistrationDate" class="form-label">{{ __('adverts.registrationDate') }}</label>
                    <input type="text" id="advertRegistrationDate" name="advert[registration_date]" class="form-control" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <label for="advertColor" class="form-label required-field">{{ __('adverts.color') }}</label>
                    <select name="advert[color]" id="advertColor" class="form-select" required>
                        <option value="" selected></option>
                        @foreach($translatedOptions['colorOptions'] as $key => $color)
                            <option value="{{ $key }}" {{ ($advert->color ?? null) == $key ? 'selected' : '' }}>
                                {{ $color }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="advertColorType" class="form-label">{{ __('adverts.colorType') }}</label>
                    <select name="advert[color_type]" id="advertColorType" class="form-select">
                        <option value="" selected></option>
                        @foreach($translatedOptions['colorTypeOptions'] as $key => $colorType)
                            <option value="{{ $key }}" {{ ($advert->color_type ?? null) == $key ? 'selected' : '' }}>
                                {{ $colorType }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <label for="advertPollutionStandard" class="form-label">{{ __('adverts.pollutionStandard') }}</label>
                    <select name="advert[pollution_standard]" id="advertPollutionStandard" class="form-select">
                        <option value="" selected></option>
                        @foreach($translatedOptions['pollutionStandardOptions'] as $pollutionStandard)
                            <option value="{{ $pollutionStandard }}" {{ ($advert->pollution_standard ?? null) == $pollutionStandard ? 'selected' : '' }}>
                                {{ $pollutionStandard }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 align-self-end">
                    <div class="form-floating">
                        <input type="text" id="advertCo2Emissions" class="form-control pe-4 @error('advert.co2_emissions') is-invalid @enderror" name="advert[co2_emissions]"
                               value="{{ $advert->co2_emissions ?? old('advert.co2_emissions') }}"
                               placeholder="{{ __('adverts.co2Emissions') }}"
                        />
                        <span class="position-absolute top-0 end-0 mt-3 me-3">g/km</span>
                        <label for="advertCo2Emissions" class="form-label">{{ __('adverts.co2Emissions') }}</label>
                        @error('advert.co2_emissions') @include('elements.errorMessage') @enderror
                    </div>
                </div>
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control @error('advert.description') is-invalid @enderror" placeholder="{{ __('adverts.description') }}..." name="advert[description]" id="advertDescription" style="height: 150px">{{ old('advert.description') }}</textarea>
                <label for="advertDescription" class="form-label">{{ __('adverts.description') }}</label>
                @error('advert.description') @include('elements.errorMessage') @enderror
            </div>
            <div class="portfolio-create__options row mb-4">
                <div class="col-12">
                    <p class="form-label">{{ __('adverts.options') }}</p>
                    <ul class="list-unstyled col-12 col-md-8 col-lg-6 col-xl-5 mb-0">
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" name="advert[deductible_vat]" value="" id="advertDeductibleVat" {{ ($advert->deductible_vat ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="advertDeductibleVat">
                                {{ __('adverts.deductibleVat') }}
                            </label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" name="advert[invoice_issued]" value="" id="advertInvoiceIssued" {{ ($advert->invoice_issued ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="advertInvoiceIssued">
                                {{ __('adverts.invoiceIssued') }}
                            </label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" name="advert[particle_filter]" value="" id="advertParticleFilter" {{ ($advert->particle_filter ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="advertParticleFilter">
                                {{ __('adverts.particleFilter') }}
                            </label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" name="advert[registered]" value="" id="advertRegistered" {{ ($advert->registered ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="advertRegistered">
                                {{ __('adverts.registered') }}
                            </label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" name="advert[original_owner]" value="" id="advertOriginalOwner" {{ ($advert->original_owner ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="advertOriginalOwner">
                                {{ __('adverts.originalOwner') }}
                            </label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" name="advert[no_accident]" value="" id="advertNoAccident" {{ ($advert->no_accident ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="advertNoAccident">
                                {{ __('adverts.noAccident') }}
                            </label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" name="advert[service_record]" value="" id="advertServiceRecord" {{ ($advert->service_record ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="advertServiceRecord">
                                {{ __('adverts.serviceRecord') }}
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="portfolio-create__features row mb-2">
                <div class="col-12">
                    <p class="form-label">{{ __('adverts.features') }}</p>
                    @foreach($translatedOptions['featureOptions'] as $key => $feature)
                        <button type="button" class="btn btn-light btn-light--secondary me-2 mb-2">
                            <input type="hidden" name="advert[features][{{ $key }}]" value="{{ ($advert->features[$key] ?? null) === $key ? '1' : '0' }}" />
                            {{ $feature }}
                        </button>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="advert[directory]" id="advertDirectory" value="{{ old('advert.directory') ?? uniqid() }}" />
            <div class="text-center">
                @include('elements.buttonLoading', [
                    'type'  => 'submit',
                    'class' => 'btn-light btn-light--success',
                    'icon'  => 'far fa-paper-plane me-1',
                    'text'  => 'actions.save',
                ])
            </div>
        </form>
        <div id="uppyModal"></div>
    </section>
@endsection

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('bundle/css/pages/portfolio.css') }}"
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bundle/js/components/selectsAutovit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bundle/js/pages/portfolio.js') }}"></script>
@endpush
