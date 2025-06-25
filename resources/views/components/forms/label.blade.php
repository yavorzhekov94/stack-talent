@props(['name', 'label', 'class' => 'form-label text-dark'])

<label {{ $attributes->merge(['class' => $class, 'for' => $name]) }}>{{ $label }}</label>
