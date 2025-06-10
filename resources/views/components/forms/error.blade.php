@props(['error' => false])

@if ($error)
    <p>{{ $error }}</p>
@endif
