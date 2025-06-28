@props(['type' => 'submit', 'class' => 'btn btn-primary w-100 py-2'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</button>
