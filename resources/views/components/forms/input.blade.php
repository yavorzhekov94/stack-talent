@props(['label', 'name', 'type' => 'text'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'form-control',
        'value' => old($name)
    ];

@endphp

<x-forms.field :$label :$name >
    <input type="{{ $type }}" {{ $attributes->merge($defaults) }}>

    @if($type === 'password')
        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
            <i class="bi bi-eye"></i>
        </button>
    @endif

</x-forms.field>

