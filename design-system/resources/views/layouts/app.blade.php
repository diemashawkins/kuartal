<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'Kuartal') }}</title>
    <meta name="description" content="{{ $description ?? 'Kuartal — building the capital, media, and research infrastructure for Southeast Asia\'s next generation of founders.' }}">

    {{--
        Inline, render-blocking theme script: MUST run before first paint
        to avoid a flash of light theme on a dark-mode visitor. Reads the
        same localStorage key as resources/js/theme-toggle.js.
    --}}
    <script>
        (function () {
            try {
                var stored = localStorage.getItem('kuartal-theme');
                var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                var theme = stored || (prefersDark ? 'dark' : 'light');
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                }
                document.documentElement.setAttribute('data-theme', theme);
            } catch (e) {}
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $head ?? '' }}
</head>
<body class="min-h-screen flex flex-col">

    @include('partials.nav')

    <main class="flex-1">
        {{ $slot }}
    </main>

    @include('partials.footer')

</body>
</html>
