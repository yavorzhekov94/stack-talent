@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'form-select'
    ];
@endphp

<x-forms.field :$label :$name >
    <select {{ $attributes->merge($defaults) }}>
        {{ $slot }}
    </select>
</x-forms.field>

