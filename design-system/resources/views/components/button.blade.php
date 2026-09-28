@props([
    'variant' => 'primary', // primary | outline | ghost
    'href' => null,
])

@php
    $classes = match($variant) {
        'outline' => 'k-btn-outline',
        'ghost' => 'k-btn-ghost',
        default => 'k-btn-primary',
    };
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
