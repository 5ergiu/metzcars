<header class="main-header">
    <a href="{{ route('app.home') }}">
        <img src="{{ asset('logo_small.png') }}" alt="Metz Cars" />
    </a>
    <div class="text-center">
        <p>{{ config('app.name') }}</p>
    </div>
    <div class="dropdown dropdown--locale">
        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('static/locales/' . app()->getLocale() . '.png') }}"  alt="" />
        </button>
        <ul class="dropdown-menu">
            @foreach(LocaleService::$locales as $code => $name)
                @if($code !== app()->getLocale())
                    <div class="dropdown-item">
                        <a href="{{ route('app.locale', $code) }}">
                            <img src="{{ asset('static/locales/' . $code . '.png') }}"  alt="{{ $code }}" />
                        </a>
                    </div>
                @endif
            @endforeach
        </ul>
    </div>
</header>
