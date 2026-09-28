@props(['href' => null])

@php
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }} @if($href) href="{{ $href }}" @endif {{ $attributes->merge(['class' => 'k-card block']) }}>
    {{ $slot }}
</{{ $tag }}>
