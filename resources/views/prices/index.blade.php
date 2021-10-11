@extends('main')

@section('meta')
    <meta name="description" content="{{ config('app.name') . ' - ' . __('labels.prices') }}">
@endsection

@section('title') {{ __('labels.prices') }} @endsection

@section('content')
    <section class="container mt-3">
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <div class="dark p-0 text-center">
                <h5 class="border-bottom p-2">
                    {{ __('prices.registrationPrices') }}
                </h5>
                <div class="p-2">
                    <p>
                        {{ __('prices.definitiveRegistrationPrice') }}:
                    </p>
                    <p>150 lei</p>
                    <p>
                        {{ __('prices.provisionalRegistrationPrice') }}:
                    </p>
                    <p>150 lei</p>
                </div>
            </div>
            <div class="dark p-0 text-center">
                <h5 class="border-bottom p-2">
                    {{ __('prices.carTaxPrices') }}
                </h5>
                <div class="p-2">
                    <p>
                        {{ __('prices.carTaxWriteOff') }}:
                    </p>
                    <p>150 lei</p>
                    <p>
                        {{ __('prices.erasuresFromCarTraffic') }}:
                    </p>
                    <p>150 lei</p>
                </div>
            </div>
            <div class="dark p-0 text-center">
                <h5 class="border-bottom p-2">
                    {{ __('prices.obtainingDuplicates') }}
                </h5>
                <div class="p-2">
                    <p>
                        {{ __('prices.registrationCertificateDuplicate') }}:
                    </p>
                    <p>150 lei</p>
                    <p>
                        {{ __('prices.registrationNumbersDuplicate') }}:
                    </p>
                    <p>150 lei</p>
                </div>
            </div>
            <div class="dark p-0 text-center">
                <h5 class="border-bottom p-2">
                    {{ __('prices.updateDocuments') }}
                </h5>
                <div class="p-2">
                    <p>
                        {{ __('prices.exchangingCarDocuments') }}:
                    </p>
                    <p>150 lei</p>
                </div>
            </div>
            <div>
                <p>Preturile includ atat efectuarea tuturor procedurilor cat si intocmirea formularelor / dosarelor necesare fiecarui serviciu (inmatriculare auto, radiere, etc). <strong>Pretul serviciului solicitat se achita dupa efectuarea acestuia</strong>, la predarea documentelor catre d-voastra.</p>
                <p><strong>Preturile nu includ contravaloarea taxelor ce trebuiesc achitate</strong>, in numele d-voastra, in vederea efectuarii serviciului dorit (de exemplu: timbrul de mediu, taxa de numar preferential, RCA valabil minim 6 luni etc). Preturile pentru inmatriculari auto includ si programarea si asistenta R.A.R.</p>
                <p>La preturile afisate <strong>nu se adauga TVA</strong>, ele fiind<strong> </strong>valabile pentru prestarea serviciilor in <strong>Bucuresti</strong> si <strong>Ilfov</strong>. Pentru alte judete, va rugam sa ne contactati.</p>
                <p>Preturile nu includ costul procurii notariale (necesara pentru reprezentarea persoanelor fizice).</p>
                <p>Contractand serviciile noastre, <strong>nu veti mai avea de facut decat doua drumuri</strong>: un drum la notar pentru semnarea procurii prin care ne imputerniciti pentru procedurile contractate (doar in cazul persoanelor fizice) si un drum la Registrul Auto Roman (pentru deplasarea masinii in vederea verificarii de autenticitate / omologare, acolo unde este cazul).</p>
            </div>
        </div>
    </section>
@endsection
