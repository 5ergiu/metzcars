@foreach($gearboxes as $key => $gearbox)
    <option value="{{ app()->getLocale() === 'en' ? $key : $gearbox['ro'] }}">
        {{ app()->getLocale() === 'en' ? $key : $gearbox['ro'] }}
    </option>
@endforeach
