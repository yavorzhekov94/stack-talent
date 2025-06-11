@props(['name', 'label', 'class' => 'form-label text-dark'])

<label class="{{ $attributes->merge(['class' => $class]) }}" for="{{ $name }}">{{ $label }}</label>
