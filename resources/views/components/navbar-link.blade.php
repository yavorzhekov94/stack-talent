@props(['active' => false])

<a class="{{ $active ? 'nav-item nav-link active' : 'nav-item nav-link' }}" {{ $attributes }}>
    {{ $slot }} </a>
