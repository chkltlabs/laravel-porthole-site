<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $metaDescription ?? 'Laravel Porthole — authenticated MCP access to Horizon, Pulse, and Telescope. See the full picture, right away.' }}">
    <meta name="color-scheme" content="dark light">
    <title>{{ $title ?? 'Porthole — See the full picture, right away.' }}</title>

    <script>
        (function () {
            try {
                var stored = localStorage.getItem('porthole-theme');
                // Dark by default; light and system remain explicit user choices.
                var theme = stored === 'light' || stored === 'dark' || stored === 'system' ? stored : 'dark';
                var resolved = theme === 'system'
                    ? (window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark')
                    : theme;
                document.documentElement.setAttribute('data-theme', resolved);
                document.documentElement.setAttribute('data-theme-preference', theme);
            } catch (e) {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="site-shell">
        <header class="site-header">
            <a class="brand-lockup" href="{{ url('/') }}">
                <svg width="28" height="28" viewBox="0 0 28 28" aria-hidden="true">
                    <circle cx="14" cy="14" r="13" fill="none" stroke="currentColor" stroke-width="1.5" opacity="0.35" />
                    <circle cx="14" cy="14" r="9.5" fill="none" stroke="#c9a24a" stroke-width="2" />
                    <circle cx="14" cy="14" r="5.5" fill="#2f8f9a" opacity="0.55" />
                </svg>
                <span class="brand-word">Porthole</span>
            </a>

            <nav class="nav-links" aria-label="Page">
                <a href="#what">What</a>
                <a href="#value">Why</a>
                <a href="#use-cases">Use cases</a>
                <a href="#requirements">Requirements</a>
                <a href="#security">Security</a>
                <a href="#getting-started">Install</a>
                <a href="https://erikgratz.com/home">About Me</a>
            </nav>

            <div class="theme-control" role="group" aria-label="Color theme">
                <button type="button" data-theme-choice="dark" aria-pressed="true">Dark</button>
                <button type="button" data-theme-choice="light" aria-pressed="false">Light</button>
                <button type="button" data-theme-choice="system" aria-pressed="false">System</button>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="section-inner">
                <p>
                    <span class="draft-banner">Draft copy</span>
                    &nbsp;·&nbsp; Laravel Porthole by
                    <a href="https://github.com/chkltlabs">chkltlabs</a>
                </p>
                <p>
                    <a href="https://github.com/chkltlabs/laravel-porthole">Package on GitHub</a>
                    &nbsp;·&nbsp;
                    <a href="https://packagist.org/packages/chkltlabs/laravel-porthole">Packagist</a>
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
