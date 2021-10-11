<footer class="footer container-md d-flex flex-column flex-lg-row flex-lg-wrap justify-content-center justify-content-lg-between align-items-center py-3">
    <div class="d-flex align-items-center">
        <div>
            <img class="me-3 h-auto" src="{{ asset('logo_small.png') }}" alt="" width="100px" />
        </div>
        <div>
            <p class="fw-bold">
                {{ __('labels.officeHours') }}: 09 - 18
            </p>
            <a class="d-block" href="tel:+40 726 205 206">
                <i class="fas fa-phone"></i>
                +40 726 205 206
            </a>
            <a class="d-block" href="mailto:office@metzcars.com?Subject=Hello" target="_top" title="Send us an email">
                <i class="far fa-envelope"></i>
                office@metzcars.com
            </a>
            <p class="fw-bold pt-2">
                {{ config('app.name') }} S.R.L &copy; {{ date('Y') }}
            </p>
        </div>
    </div>
    <div class="flex-grow-1 d-flex flex-column flex-xl-row justify-content-between align-items-center">
        <div class="flex-grow-1 d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3 my-4">
            <a href="#termsModal" data-bs-toggle="modal" data-bs-target="#termsModal">
                {{ __('labels.terms') }}
            </a>
            <span class="d-none d-sm-inline-block">|</span>
            <a href="#privacyModal" data-bs-toggle="modal" data-bs-target="#privacyModal">
                {{ __('labels.privacy') }}
            </a>
            <span class="d-none d-sm-inline-block">|</span>
            <a href="{{ route('contacts.create') }}">
                {{ __('labels.contact') }}
            </a>
        </div>
        <ul class="footer__social list-unstyled d-flex mb-0">
            <li>
                <a href="https://www.facebook.com/metzcars" target="_blank" title="Facebook">
                    <img src="{{ asset('static/social/facebook.svg') }}" width="35px" alt="Facebook" />
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/metz_cars/" target="_blank" title="Instagram">
                    <img src="{{ asset('static/social/instagram.svg') }}" width="35px" alt="Instagram" />
                </a>
            </li>
            <li>
                <a href="https://m.me/metzcars" target="_blank" title="Messenger">
                    <img src="{{ asset('static/social/messenger.svg') }}" width="35px" alt="Messenger" />
                </a>
            </li>
            <li>
                <a href="https://wa.me/+040726205206" target="_blank" title="Whatsapp">
                    <img src="{{ asset('static/social/whatsapp.svg') }}" width="35px" alt="Whatsapp" />
                </a>
            </li>
            <li>
                <a href="https://goo.gl/maps/gqFFbcW7ZiXNa4u76" target="_blank" title="Google Maps">
                    <img src="{{ asset('static/social/maps.svg') }}" width=30px" alt="Maps" />
                </a>
            </li>
            <li>
                <a href="https://ul.waze.com/ul?place=EiVTdHIuIFNvYXJlbHVpLCBIb3JwYXogNzA3MzEzLCBSb21hbmlhIi4qLAoUChIJ02lXaWX6ykARmgH_iunB-gUSFAoSCTPDChV3-spAETe4ubrA_pgz&ll=47.11043950%2C27.54954310&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location" target="_blank"  title="Waze">
                    <img src="{{ asset('static/social/waze.svg') }}" width="40px" alt="Waze" />
                </a>
            </li>
        </ul>
    </div>

    {{--  Terms + Privacy modals  --}}
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                @include("elements.terms." . app()->getLocale())
            </div>
        </div>
    </div>
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                @include("elements.privacy." . app()->getLocale())
            </div>
        </div>
    </div>
</footer>
