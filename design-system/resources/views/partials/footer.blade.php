@php
    $kEcosystem = config('kuartal.ecosystem', []);
    $kSiteName = config('kuartal.site_name', 'Kuartal');
    $kContactEmail = config('kuartal.contact_email', 'hello@kuartal.id');
@endphp

<footer class="k-rule bg-white dark:bg-surface-dark">
    <div class="k-container py-14">
        <div class="grid gap-10 md:grid-cols-3">
            <div>
                <div class="font-display text-lg font-semibold text-navy dark:text-white">{{ $kSiteName }}</div>
                <p class="mt-3 text-sm text-gray-muted dark:text-white/60 max-w-xs">
                    {{ $footerNote ?? 'Building the capital, media, and research infrastructure for Southeast Asia\'s next generation of founders.' }}
                </p>
            </div>

            <div>
                <div class="k-eyebrow mb-3">Kuartal Ecosystem</div>
                <ul class="space-y-2">
                    @foreach($kEcosystem as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="k-navlink">{{ $link['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <div class="k-eyebrow mb-3">Contact</div>
                <a href="mailto:{{ $kContactEmail }}" class="k-navlink">{{ $kContactEmail }}</a>
            </div>
        </div>

        <div class="k-rule mt-10 pt-6 flex flex-col md:flex-row justify-between gap-2 text-xs text-gray-muted dark:text-white/40">
            <span>&copy; {{ date('Y') }} {{ $kSiteName }}. All rights reserved.</span>
            <span>Jakarta, Indonesia</span>
        </div>
    </div>
</footer>
