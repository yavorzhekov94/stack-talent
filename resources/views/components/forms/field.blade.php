@props(['label', 'name'])

<div class="mb-3">
    @if ($label)
        <x-forms.label :$name :$label />
    @endif

    {{ $slot }}

    <x-forms.error :error="$errors->first($name)" />

</div>
