<header class="main-header">
    <a href="{{ route('app.home') }}">
        <img src="{{ asset('logo_small.png') }}" alt="Metz Cars" />
    </a>
    <div class="text-center flex-grow-1 flex-sm-grow-0">
        <p>{{ config('app.name') }}</p>
    </div>
    @auth
        <div class="dropdown dropdown--account">
            <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('static/guest.png') }}"  alt="" />
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button button--transparent button--transparent--success">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth
    <div class="dropdown dropdown--locale">
        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('static/locales/' . app()->getLocale() . '.png') }}"  alt="" />
        </button>
        <ul class="dropdown-menu">
            @foreach(LocaleService::$locales as $code => $name)
                @if($code !== app()->getLocale())
                    <li class="dropdown-item">
                        <a href="{{ route('app.locale', $code) }}">
                            <img src="{{ asset('static/locales/' . $code . '.png') }}"  alt="{{ $code }}" />
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</header>
