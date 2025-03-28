<div>
    @if ($type === 'text')
        {{-- {{dd($field['name'])}} --}}
        <input type="{{ $type }}" name="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] }}"
            value="{{ $field['value'] }}">
        <h2>Texte</h2>
    @elseif ($type === 'textarea')
        <textarea name="{{ $field['name'] }}" id="" cols="30" rows="10">{{ $field['value'] }}</textarea>
        <h2>Texte Area</h2>
    @elseif ($type === 'select')
        <select name="{{ $field['name'] }}" id="">

        </select>
    @endif
</div>
