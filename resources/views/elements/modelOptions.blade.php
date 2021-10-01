@foreach($models as $key => $model)
    <option value="{{ $model['en'] }}" data-model="{{ $key }}>
        {{ $model['en'] }}
    </option>
@endforeach

