<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $siteName = 'Laravel Porthole';
        $pageTitle = $title ?? 'Laravel Porthole — MCP for Horizon, Pulse & Telescope';
        $pageDescription = $metaDescription ?? 'Authenticated MCP server for Laravel apps running Horizon, Pulse, or Telescope — let your coding agent query ops telemetry without leaving the editor.';
        $canonicalUrl = $canonical ?? rtrim((string) config('app.url'), '/').'/';
        $ogImage = $ogImage ?? rtrim((string) config('app.url'), '/').'/og-image.png';
    @endphp
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Erik Gratz">
    <meta name="theme-color" content="#061018" media="(prefers-color-scheme: dark)">
    <meta name="theme-color" content="#f3f7f9" media="(prefers-color-scheme: light)">
    <meta name="color-scheme" content="dark light">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" sizes="180x180">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Porthole for Laravel — authenticated MCP for Horizon, Pulse & Telescope">
    <meta property="og:locale" content="en_US">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="twitter:image:alt" content="Porthole for Laravel — authenticated MCP for Horizon, Pulse & Telescope">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebSite',
                    '@id' => $canonicalUrl.'#website',
                    'url' => $canonicalUrl,
                    'name' => $siteName,
                    'description' => $pageDescription,
                    'publisher' => ['@id' => $canonicalUrl.'#author'],
                ],
                [
                    '@type' => 'SoftwareApplication',
                    '@id' => $canonicalUrl.'#software',
                    'name' => 'Laravel Porthole',
                    'applicationCategory' => 'DeveloperApplication',
                    'operatingSystem' => 'PHP / Laravel',
                    'description' => $pageDescription,
                    'url' => $canonicalUrl,
                    'downloadUrl' => 'https://packagist.org/packages/chkltlabs/laravel-porthole',
                    'softwareVersion' => '1.x',
                    'offers' => [
                        '@type' => 'Offer',
                        'price' => '0',
                        'priceCurrency' => 'USD',
                    ],
                    'author' => ['@id' => $canonicalUrl.'#author'],
                    'sameAs' => [
                        'https://github.com/chkltlabs/laravel-porthole',
                        'https://packagist.org/packages/chkltlabs/laravel-porthole',
                    ],
                ],
                [
                    '@type' => 'Person',
                    '@id' => $canonicalUrl.'#author',
                    'name' => 'Erik Gratz',
                    'url' => 'https://erikgratz.com',
                    'sameAs' => [
                        'https://github.com/chkltlabs',
                        'https://erikgratz.com',
                    ],
                ],
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) !!}
    </script>

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

            <nav class="nav-links" aria-label="Primary">
                <a href="#what">What</a>
                <a href="#value">Why</a>
                <a href="#use-cases">Use cases</a>
                <a href="#requirements">Requirements</a>
                <a href="#security">Security</a>
                <a href="#getting-started">Install</a>
                <a href="https://erikgratz.com/home" rel="author noopener">About Me</a>
            </nav>

            <div class="theme-control" role="group" aria-label="Color theme">
                <button type="button" data-theme-choice="dark" aria-pressed="true">Dark</button>
                <button type="button" data-theme-choice="light" aria-pressed="false">Light</button>
                <button type="button" data-theme-choice="system" aria-pressed="false">System</button>
            </div>
        </header>

        <main id="main">
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="section-inner">
                <p>
                    <span class="draft-banner">Draft copy</span>
                    &nbsp;·&nbsp; Laravel Porthole by
                    <a href="https://github.com/chkltlabs" rel="noopener">chkltlabs</a>
                </p>
                <p>
                    <a href="https://github.com/chkltlabs/laravel-porthole" rel="noopener">Package on GitHub</a>
                    &nbsp;·&nbsp;
                    <a href="https://packagist.org/packages/chkltlabs/laravel-porthole" rel="noopener">Packagist</a>
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
