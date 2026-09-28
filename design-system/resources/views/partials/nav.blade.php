@php
    $kNav = config('kuartal.nav', []);
    $kSiteName = config('kuartal.site_name', 'Kuartal');
    $kSiteTag = config('kuartal.site_tag');
@endphp

<header class="sticky top-0 z-50 border-b border-gray-border bg-white/90 backdrop-blur
               dark:border-white/10 dark:bg-surface-dark/90">
    <div class="k-container flex h-16 items-center justify-between">

        <a href="/" class="flex items-center gap-2 font-display text-lg font-semibold text-navy dark:text-white">
            {{ $kSiteName }}
            @if($kSiteTag)
                <span class="k-eyebrow font-sans">{{ $kSiteTag }}</span>
            @endif
        </a>

        <nav class="hidden md:flex items-center gap-8">
            @foreach($kNav as $item)
                <a href="{{ $item['url'] }}" class="k-navlink">{{ $item['label'] }}</a>
            @endforeach
        </nav>

        <div class="hidden md:flex items-center gap-3">
            <button type="button" data-theme-toggle aria-pressed="false"
                    class="flex h-9 w-9 items-center justify-center rounded-full border border-gray-border
                           text-navy hover:border-green-400 hover:text-green-500 transition-colors
                           dark:border-white/15 dark:text-white dark:hover:border-green-400 dark:hover:text-green-400"
                    aria-label="Toggle dark mode">
                {{-- sun icon (shown in dark mode) --}}
                <svg class="hidden h-[18px] w-[18px] dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <circle cx="12" cy="12" r="4"/>
                    <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>
                </svg>
                {{-- moon icon (shown in light mode) --}}
                <svg class="h-[18px] w-[18px] dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                </svg>
            </button>

            {{ $navCta ?? '' }}
        </div>

        {{-- Mobile --}}
        <button type="button" data-nav-toggle aria-expanded="false" aria-label="Open menu"
                class="md:hidden flex h-9 w-9 items-center justify-center text-navy dark:text-white">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M4 7h16M4 12h16M4 17h16"/>
            </svg>
        </button>
    </div>

    <div data-nav-panel class="hidden md:hidden border-t border-gray-border dark:border-white/10 bg-white dark:bg-surface-dark">
        <nav class="k-container flex flex-col gap-1 py-4">
            @foreach($kNav as $item)
                <a href="{{ $item['url'] }}" class="k-navlink py-2">{{ $item['label'] }}</a>
            @endforeach
            <button type="button" data-theme-toggle aria-pressed="false" class="k-navlink py-2 text-left">
                Toggle dark mode
            </button>
        </nav>
    </div>
</header>
