# Kuartal Shared Design System

This is the shared visual + component layer for all 5 Kuartal properties:

- **kuartal.id** — firm landing page, team, portfolio, programmes, funds, Kuartal AI
- **kuartalspace.com** — the current article/infinite-scroll site, plus LMS, chat, webinars
- **kuartalcapital.com**
- **kuartalimpact.org**
- **kuartalventures.com**

It is **not** a runnable Laravel app by itself — it's the design-system layer
(Tailwind config, base layout, shared partials/components, dark mode) meant
to be copied into a fresh Laravel install for each property.

## Why this wasn't scaffolded with `composer create-project` here

This build environment's outbound network is allowlisted to npm, PyPI,
crates.io and the Go module proxy only — **Packagist (Composer's registry)
is not reachable from here**, so I can't run Composer commands in this
sandbox. That's a network policy restriction, not a code problem. Do the
one-time Laravel install step yourself, locally or on your server, where you
have normal internet access — everything after that (the actual site code)
I can still build for you here.

## One-time setup (run this locally / on your server, not in this chat)

```bash
# 1. Create a fresh Laravel app for the property you're building first
composer create-project laravel/laravel kuartal-id
cd kuartal-id

# 2. Copy this design system's files in, merging into the new app:
#    - tailwind.config.js        -> project root (overwrite)
#    - postcss.config.js         -> project root (overwrite)
#    - vite.config.js            -> project root (overwrite)
#    - resources/css/app.css     -> resources/css/app.css (overwrite)
#    - resources/js/app.js       -> resources/js/app.js (overwrite)
#    - resources/js/theme-toggle.js -> resources/js/theme-toggle.js (new)
#    - resources/views/layouts/  -> resources/views/layouts/ (new)
#    - resources/views/partials/ -> resources/views/partials/ (new)
#    - resources/views/components/ -> resources/views/components/ (new)
#    - resources/views/demo.blade.php -> resources/views/demo.blade.php (new, optional)
#    - config/kuartal.php        -> config/kuartal.php (new)

# 3. Install the extra Tailwind plugins this design system uses
npm install
npm install -D @tailwindcss/forms @tailwindcss/typography

# 4. Set the per-site values in .env (or edit config/kuartal.php directly)
echo 'KUARTAL_SITE_NAME="Kuartal"' >> .env
echo 'KUARTAL_SITE_TAG=""' >> .env
echo 'KUARTAL_CONTACT_EMAIL="hello@kuartal.id"' >> .env

# 5. Edit config/kuartal.php's `nav` array to match this property's own
#    sitemap (kuartal.id's nav differs from kuartalimpact.org's, etc.)

# 6. Sanity-check it
php artisan serve &
npm run dev
# then add a temporary route to see it:
#   Route::view('/design-system', 'demo');
# and visit http://127.0.0.1:8000/design-system
```

Repeat steps 1–6 for each of the other 4 properties, changing only the
`.env` values and `config/kuartal.php` nav array per site — everything else
(colors, type, components, dark mode) stays identical, which is the point.

## What's in here

| Path | Purpose |
|---|---|
| `tailwind.config.js` | Brand color tokens (navy, navy-deep, green, gray-bg, gray-border), fonts (Playfair Display + Inter), `darkMode: 'class'` |
| `resources/css/app.css` | Base styles + reusable component classes (`.k-btn-primary`, `.k-card`, `.k-container`, `.k-section`, etc.) |
| `resources/js/theme-toggle.js` | Light/dark toggle logic — localStorage-persisted, respects system preference, no flash-of-wrong-theme |
| `resources/js/app.js` | Entry point — imports theme-toggle, wires up mobile nav |
| `resources/views/layouts/app.blade.php` | Base HTML shell every page extends (`<x-layouts.app>`) — includes the pre-paint theme script and Vite directives |
| `resources/views/partials/nav.blade.php` | Shared header/nav, dark mode toggle button, mobile menu |
| `resources/views/partials/footer.blade.php` | Shared footer with cross-links to all 5 properties |
| `resources/views/components/button.blade.php` | `<x-button variant="primary\|outline\|ghost" href="...">` |
| `resources/views/components/card.blade.php` | `<x-card>` — rounded bordered container, dark-mode aware |
| `resources/views/components/section-header.blade.php` | `<x-section-header eyebrow title subtitle align="left\|center">` |
| `resources/views/demo.blade.php` | Reference page — route it temporarily to preview the whole system |
| `config/kuartal.php` | Per-property config: site name/tag, nav links, ecosystem cross-links, contact email |

## Dark mode — how it works

- Strategy: Tailwind's `class` mode (`html.dark`)
- An inline `<script>` in the `<head>` of `layouts/app.blade.php` reads
  `localStorage['kuartal-theme']` (or falls back to
  `prefers-color-scheme`) and adds the `dark` class **before first paint**,
  so there's no flicker.
- `resources/js/theme-toggle.js` wires up any `[data-theme-toggle]` button
  (already placed in the nav) to flip the class and persist the choice.
- Multi-tab sync: a `storage` event listener keeps other open tabs in sync
  if you switch theme in one.

## Brand tokens reference

```
navy         #18333d   — primary brand color, headings, nav text
navy-deep    #0b1319   — darkest navy, used sparingly (footers, deep sections)
green        #36cc64   — accent, CTAs, eyebrow labels, links on hover
gray-bg      #f7f9f9   — light-mode page background
gray-border  #e1e8ed   — light-mode borders/dividers
```

Use them as Tailwind utilities: `bg-navy`, `text-green-400`, `border-gray-border`,
`dark:bg-surface-dark`, `dark:text-white`, etc. — see `tailwind.config.js`
for the full scale (each color has a 50–900 range for tints/shades).

## Next steps

Once you've run the one-time Composer install for **kuartal.id** locally and
confirmed the demo page renders correctly (colors, fonts, dark mode toggle
all working), tell me and I'll build the actual kuartal.id pages on top of
this — landing page (draper.vc-inspired), Team, Portfolio, Programmes, and
Funds — as Blade views using these same components. I can write all of that
code here; it's only the initial `composer create-project` step that needs
to happen on a machine with full internet access.
