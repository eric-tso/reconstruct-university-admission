@props(['name','required' => ''])

<label class="block mb-2 uppercase font-bold text-xs text-gray-700 {{ $required }}"
            for="{{ $name }}"
>
    {{ ucwords($name) }}
</label>