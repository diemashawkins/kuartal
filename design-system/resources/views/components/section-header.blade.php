@props(['eyebrow' => null, 'title', 'subtitle' => null, 'align' => 'left'])

<div class="{{ $align === 'center' ? 'text-center mx-auto' : '' }} max-w-2xl mb-10">
    @if($eyebrow)
        <div class="k-eyebrow mb-3">{{ $eyebrow }}</div>
    @endif
    <h2 class="text-3xl md:text-4xl">{{ $title }}</h2>
    @if($subtitle)
        <p class="mt-4 text-gray-muted dark:text-white/60 text-lg">{{ $subtitle }}</p>
    @endif
</div>
