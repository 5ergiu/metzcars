<footer class="main-footer d-flex flex-wrap justify-content-between align-items-center">
    <div class="main-footer__contact d-flex">
        <img src="{{ asset('logo_small.png') }}" alt="" />
        <div class="d-flex flex-column my-1">
            <p>
                <i class="fas fa-phone"></i>
                0726 205 206
            </p>
            <a href="mailto:office@metzcars.com?Subject=Hello" target="_top" title="Send us an email">
                <i class="far fa-envelope"></i>
                office@metzcars.com
            </a>
            <p class="muted mt-auto">
                Copyright &copy; {{ date('Y') }}
                <a href="{{ route('app.home') }}">
                    {{ config('app.name') }}
                </a>
            </p>
        </div>
    </div>
    <div class="main-footer__links flex-grow-1 text-center flex-grow-md-0">
        <a href="{{ route('app.legal.terms') }}">
            {{ __('labels.terms') }}
            <span>|</span>
        </a>
        <a href="{{ route('app.legal.privacy') }}">
            {{ __('labels.privacy') }}
            <span>|</span>
        </a>
        <a href="{{ route('app.contact') }}">
            {{ __('labels.contact') }}
        </a>
    </div>
    <div class="main-footer__social  flex-grow-1 text-center text-xl-end flex-xl-grow-0">
        <a href="https://www.facebook.com/metzcars" target="_blank">
            <i class="fab fa-facebook-square"></i>
        </a>
        <a href="https://m.me/metzcars" target="_blank">
            <i class="fab fa-facebook-messenger"></i>
        </a>
        <a href="#"  target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="#" target="_blank">
            <i class="fab fa-waze"></i>
        </a>
    </div>
</footer>


{{--Footer--}}
{{--As vrea sa punem toate linkurile simpatice de social media, gen insta, facebook, messenger, maps, waze etc--}}
{{--+ Terms & condition + Privacy policy si poate un short list cu quick menu items sau ceva … ok--}}
