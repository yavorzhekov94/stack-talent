@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name)
    ];

@endphp
<div class="form-check">
    <input {{ $attributes->merge($defaults) }}>
    <x-forms.label class="form-check-label text-muted" :$label :$name  />
</div>


