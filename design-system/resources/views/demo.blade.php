{{--
    Demo/reference page — proves the design system renders correctly.
    Route it temporarily (e.g. Route::view('/design-system', 'demo');) on
    any property to sanity-check the palette, dark mode, and components
    after copying these files in.
--}}
<x-layouts.app title="Kuartal Design System — Preview">

    <section class="k-section">
        <div class="k-container">
            <x-section-header
                eyebrow="Design System"
                title="Kuartal shared design tokens"
                subtitle="Same palette, type, and components across kuartal.id, kuartalspace.com, kuartalcapital.com, kuartalimpact.org, and kuartalventures.com."
            />

            <div class="flex flex-wrap gap-3 mb-14">
                <x-button variant="primary">Primary button</x-button>
                <x-button variant="outline">Outline button</x-button>
                <x-button variant="ghost">Ghost button</x-button>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <x-card>
                    <div class="k-eyebrow mb-2">Fund</div>
                    <h3 class="text-xl mb-2">Kuartal Impact</h3>
                    <p class="text-sm text-gray-muted dark:text-white/60">Impact-focused capital for Indonesia's most underserved sectors.</p>
                </x-card>
                <x-card>
                    <div class="k-eyebrow mb-2">Programme</div>
                    <h3 class="text-xl mb-2">Founders Residency</h3>
                    <p class="text-sm text-gray-muted dark:text-white/60">An immersive, capital-backed residency for early-stage founders.</p>
                </x-card>
                <x-card>
                    <div class="k-eyebrow mb-2">Fund</div>
                    <h3 class="text-xl mb-2">Kuartal Ventures</h3>
                    <p class="text-sm text-gray-muted dark:text-white/60">Early-stage venture capital across Southeast Asia's digital economy.</p>
                </x-card>
            </div>
        </div>
    </section>

</x-layouts.app>
