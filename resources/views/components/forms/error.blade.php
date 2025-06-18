@props(['error' => false])

@if ($error)
    <p class="text-danger small mt-1">{{ $error }}</p>
@endif
