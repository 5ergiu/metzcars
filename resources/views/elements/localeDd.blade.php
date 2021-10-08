<div class="dropdown dropdown-locale px-2 px-sm-0">
    <button type="button" data-bs-toggle="dropdown" aria-expanded="false" title="{{ __('labels.changeLanguage') }}">
        <img src="{{ asset('static/locales/' . app()->getLocale() . '.png') }}" width="60px" alt="{{ __('labels.changeLanguage') }}" />
    </button>
    <ul class="dropdown-menu border-0">
        @foreach(LocaleService::$locales as $code => $name)
            @if($code !== app()->getLocale())
                <li class="dropdown-item p-0">
                    <a href="{{ route('locale', $code) }}">
                        <img src="{{ asset('static/locales/' . $code . '.png') }}" width="60px" alt="{{ $code }}" />
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
