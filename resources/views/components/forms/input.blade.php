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
    <div class="input-group">
        <input class="form-control" type="{{ $type }}" {{ $attributes->merge($defaults) }}>

        @if($type === 'password')
            <x-button-eye :$name />
        @endif
    </div>
</x-forms.field>

