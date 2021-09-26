<div class="wrapper">
    <footer class="main-footer d-flex flex-wrap justify-content-between align-items-center">
        <div class="main-footer__contact d-flex flex-grow-1 justify-content-center flex-sm-grow-0">
            <img src="{{ asset('logo_small.png') }}" alt="" />
            <div class="d-flex flex-column my-1">
                <a href="tel:+40 726 205 206">
                    <i class="fas fa-phone"></i>
                    +40 726 205 206
                </a>
                <a href="mailto:office@metzcars.com?Subject=Hello" target="_top" title="Send us an email">
                    <i class="far fa-envelope"></i>
                    office@metzcars.com
                </a>
                <p class="muted mt-auto">
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

        {{--  Terms + Privacy modals  --}}
        <div class="legal-modal modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">{{ __('labels.terms') }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p>
                        <h4>Confidentiality</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="legal-modal modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">{{ __('labels.privacy') }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p>
                         <p>
                             Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                             when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                             It has survived not only five centuries, but also the leap into electronic typesetting,
                             remaining essentially unchanged.
                         </p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p>
                   </div>
                </div>
            </div>
        </div>
    </footer>
</div>
