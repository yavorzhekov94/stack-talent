@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'form-control',
        'rows' => 3
    ];
@endphp

<x-forms.field :$label :$name >
    <textarea {{ $attributes->merge($defaults) }}> {{ $slot }}</textarea>
</x-forms.field>
