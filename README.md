# Laravel Porthole Site

Marketing one-pager for [Laravel Porthole](https://github.com/chkltlabs/laravel-porthole) — an authenticated MCP server for Horizon, Pulse, and Telescope.

**Domain:** [porthole.erikgratz.com](https://porthole.erikgratz.com)  
**Stack:** Laravel 13 · Blade · Vite · Tailwind CSS 4

> Copy on this site is **draft** until Erik approves it. Install, requirements, and security claims summarize the package README — that repo remains source of truth.

## Local development

```bash
composer install
cp .env.example .env
php artisan key:generate
npm ci
npm run dev
```

In another terminal:

```bash
php artisan serve
```

Production assets:

```bash
npm run build
```

## Structure notes

- Marketing page: `resources/views/pages/home.blade.php`
- Layout: `resources/views/layouts/site.blade.php`
- Routes intentionally thin (`/`) so a future `/docs` suite can land beside the marketing page without a rewrite.

## Package docs

Authoritative install / auth / MCP client config:

https://github.com/chkltlabs/laravel-porthole
