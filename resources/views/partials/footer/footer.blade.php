<div class="wrapper">
    <footer class="main-footer d-flex flex-wrap justify-content-between align-items-center">
        <div class="main-footer__contact d-flex flex-grow-1 justify-content-center flex-sm-grow-0">
            <img src="{{ asset('logo_small.png') }}" alt="" />
            <div class="d-flex flex-column my-1">
                <p>
                    {{ __('labels.businessHours') }}: 09:00 - 18:00
                </p>
                <a href="tel:+40 726 205 206">
                    <i class="fas fa-phone"></i>
                    +40 726 205 206
                </a>
                <a href="mailto:office@metzcars.com?Subject=Hello" target="_top" title="Send us an email">
                    <i class="far fa-envelope"></i>
                    office@metzcars.com
                </a>
                <p class="muted pt-2">
                    {{ config('app.name') }} S.R.L &copy; {{ date('Y') }}
                </p>
            </div>
        </div>
        <div class="main-footer__links flex-grow-1 text-center flex-grow-md-0">
            <a href="#termsModal" data-bs-toggle="modal" data-bs-target="#termsModal">
                {{ __('labels.terms') }}
                <span>|</span>
            </a>
            <a href="#privacyModal" data-bs-toggle="modal" data-bs-target="#privacyModal">
                {{ __('labels.privacy') }}
                <span>|</span>
            </a>
            <a href="{{ route('app.contacts.create') }}">
                {{ __('labels.contact') }}
            </a>
        </div>
        <div class="main-footer__social flex-grow-1 text-center text-xl-end flex-xl-grow-0">
            <a href="https://www.facebook.com/metzcars" target="_blank">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="https://www.instagram.com/metz_cars/"  target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://m.me/metzcars" target="_blank">
                <i class="fab fa-facebook-messenger"></i>
            </a>
            <a href="https://wa.me/0040726205206" target="_blank">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://ul.waze.com/ul?place=EiVTdHIuIFNvYXJlbHVpLCBIb3JwYXogNzA3MzEzLCBSb21hbmlhIi4qLAoUChIJ02lXaWX6ykARmgH_iunB-gUSFAoSCTPDChV3-spAETe4ubrA_pgz&ll=47.11043950%2C27.54954310&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location" target="_blank">
                <i class="fab fa-waze"></i>
            </a>
        </div>

        {{--  Terms + Privacy modals  --}}
        <div class="legal-modal modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    @include("elements.terms." . app()->getLocale())
                </div>
            </div>
        </div>
        <div class="legal-modal modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    @include("elements.privacy." . app()->getLocale())
                </div>
            </div>
        </div>
    </footer>
</div>
