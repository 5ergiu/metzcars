<button type="{{ $type ?? 'button' }}" class="btn btn-loading{{ $type === 'submit' ? '-submit' : '' }} {{ $class ?? '' }}">
    <span class="btn-loading__text">
        @if(!empty($icon))
            <i class="{{ $icon }}"></i>
        @endif
        {{ __($text) }}
    </span>
    <span class="btn-loading__spinner" role="status">
        {{ __('labels.pleaseWait') }}... <span class="spinner-border spinner-border-sm align-middle"></span>
    </span>
</button>
