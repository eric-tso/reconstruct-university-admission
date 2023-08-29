@props(['name', 'application', 'value'])

@php
    if (old('$name', $application->$name) == $value){
        $selected = 'selected';
    }else{
        $selected = '';
    }
@endphp

<option value="{{ $value }}" {{ $selected }}>{{ $slot }}</option>