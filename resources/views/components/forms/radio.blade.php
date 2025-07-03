@props(['label', 'name', 'id'])

@php
    $defaults = [
        'type' => 'radio',
        'id' => $id,
        'name' => $name,
        'value' => $id
    ];

    $name = $id;
@endphp
<div class="form-check">
    <input {{ $attributes->merge($defaults) }}>
    <x-forms.label class="form-check-label text-muted" :$label :$name  />
</div>
