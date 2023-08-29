@props(['name', 'type' => 'text', 'label', 'class' => 'border border-gray-200 p-2 w-full rounded', 'required' => ''])

<x-form.field>
    <x-form.label name="{{ $label ?? $name }}" required="{{ $required }}"/>

    <input  class="{{ $class }}"
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            {{ $attributes(['value' => old($name)]) }}
    >

    {{ $slot }}

    <x-form.error name="{{ $name }}" />
</x-form.field>