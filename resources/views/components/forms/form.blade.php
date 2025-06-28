@php
    $method = strtoupper($attributes->get('method', 'GET'));
    $isNotStandartMethod = in_array($method, ['PUT', 'PATCH', 'DELETE']);
@endphp

<form method="{{ $isNotStandartMethod ? 'POST' : $method }}"
    {{ $attributes->except('method')->merge(['class' => 'form']) }}>
    @if ($isNotStandartMethod)
        @csrf
        @method($method)
    @elseif ($method === 'POST')
        @csrf
    @endif

    {{ $slot }}
</form>
