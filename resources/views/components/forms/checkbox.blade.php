@props(['label', 'name', 'checked' => false])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'checked' => $checked
    ];

@endphp
<div class="form-check">
    <input {{ $attributes->merge($defaults) }}>
    <x-forms.label class="form-check-label text-muted" :$label :$name  />
</div>


