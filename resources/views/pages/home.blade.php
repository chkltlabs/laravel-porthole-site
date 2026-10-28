@extends('layouts.site')

@section('content')
    <section class="hero" aria-labelledby="hero-brand">
        <div class="hero-copy">
            <h1 id="hero-brand" class="hero-brand">
                Porthole
                <span>for Laravel</span>
            </h1>
            <p class="hero-tagline">See the full picture, right away.</p>
            <p class="hero-lede">
                An authenticated MCP server that lets your coding agent read Horizon, Pulse, and Telescope —
                without you tabbing out of the editor to piece the ops story together.
            </p>
            <div class="cta-row">
                <a class="btn btn-primary" href="#getting-started">Get started</a>
                <a class="btn btn-ghost" href="https://github.com/chkltlabs/laravel-porthole">View on GitHub</a>
            </div>
        </div>

        <div class="hero-visual" aria-hidden="true">
            <div class="porthole-stage">
                @include('components.porthole-mark')
            </div>
        </div>
    </section>

    <section id="what" class="section reveal">
        <div class="section-inner">
            <p class="section-kicker">What it is</p>
            <h2 class="section-title">Ops telemetry, spoken as tools.</h2>
            <p class="section-lede">
                Laravel Porthole is an authenticated
                <a href="https://modelcontextprotocol.io">Model Context Protocol</a>
                server for apps that already run Horizon, Pulse, and/or Telescope. It sits on
                <a href="https://github.com/laravel/mcp">laravel/mcp</a>
                and exposes those sources as MCP tools your agent can call.
            </p>
            <ul class="prose-list">
                <li>
                    <strong>Read tools register by default.</strong>
                    Horizon status and jobs, Pulse health and slow paths, Telescope entries —
                    available when the matching package is installed.
                </li>
                <li>
                    <strong>Write tools stay off until you opt in.</strong>
                    Pausing Horizon, retrying failed jobs, and pruning Telescope are gated behind
                    explicit config flags and a separate <code>mutateHorizon</code> gate.
                </li>
                <li>
                    <strong>Two transports.</strong>
                    Local stdio via <code>php artisan mcp:start porthole</code> (local env only),
                    or HTTP at <code>POST /mcp/porthole</code> with bearer auth or Porthole’s own OAuth issuer.
                </li>
            </ul>
        </div>
    </section>

    <section id="value" class="section reveal">
        <div class="section-inner">
            <p class="section-kicker">Why teams install it</p>
            <h2 class="section-title">Keep the investigation where the code is.</h2>
            <p class="section-lede">
                You already trust Horizon, Pulse, and Telescope. Porthole does not replace them —
                it lets an agent query the same operational picture while it is already in your repo.
            </p>
            <div class="split-grid">
                <ul class="prose-list">
                    <li>
                        <strong>Faster incident loops.</strong>
                        Ask what failed, what is slow, and what the queue looks like without leaving the agent session.
                    </li>
                    <li>
                        <strong>Same gates you already enforce.</strong>
                        Callers need an authenticated user who passes <code>viewPorthole</code>
                        plus the source gate (<code>viewHorizon</code>, <code>viewPulse</code>, or <code>viewTelescope</code>).
                        An undefined gate denies the call.
                    </li>
                </ul>
                <ul class="prose-list">
                    <li>
                        <strong>Freeware, open package.</strong>
                        Install from Packagist, configure gates, connect your MCP client. No product tour required.
                    </li>
                    <li>
                        <strong>Built for people who already live in the stack.</strong>
                        Solo Laravel builders and platform/infra folks who keep Telescope/Horizon/Pulse warm —
                        not a dashboard pitch for executives.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="use-cases" class="section reveal">
        <div class="section-inner">
            <p class="section-kicker">Use cases</p>
            <h2 class="section-title">Where Porthole earns its keep.</h2>
            <p class="section-lede">
                Practical moments when an agent with ops context is more useful than another browser tab.
            </p>
            <div class="use-cases">
                <article class="use-case">
                    <h3>Local debugging with stdio</h3>
                    <p>
                        Point Cursor, Claude Code, or VS Code at
                        <code>php artisan mcp:start porthole</code>
                        in a local app. The agent can pull Horizon/Pulse/Telescope context while you fix the bug.
                    </p>
                </article>
                <article class="use-case">
                    <h3>Shared HTTP access for the team</h3>
                    <p>
                        Expose <code>/mcp/porthole</code> behind Sanctum or API auth so agents in staging
                        can read the same sources your staff already can — with throttle and gates intact.
                    </p>
                </article>
                <article class="use-case">
                    <h3>Careful write affordances</h3>
                    <p>
                        When you intentionally enable writes, an agent can pause Horizon, resume it,
                        or retry allowlisted failed jobs — still behind <code>mutateHorizon</code>,
                        never as a silent default.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section id="requirements" class="section reveal">
        <div class="section-inner">
            <p class="section-kicker">Requirements</p>
            <h2 class="section-title">What you need on the host app.</h2>
            <p class="section-lede">
                Summarized from the
                <a href="https://github.com/chkltlabs/laravel-porthole">package README</a>
                — treat that document as source of truth.
            </p>
            <ul class="req-list">
                <li><span aria-hidden="true">01</span><div>PHP <strong>8.2+</strong></div></li>
                <li><span aria-hidden="true">02</span><div>Laravel <strong>11.45</strong>, <strong>12.41</strong>, or <strong>13</strong></div></li>
                <li><span aria-hidden="true">03</span><div><code>laravel/mcp</code> <strong>1.x</strong></div></li>
                <li>
                    <span aria-hidden="true">04</span>
                    <div>At least one of <code>laravel/horizon</code>, <code>laravel/pulse</code>, or <code>laravel/telescope</code></div>
                </li>
            </ul>
        </div>
    </section>

    <section id="security" class="section reveal">
        <div class="section-inner">
            <p class="section-kicker">Security</p>
            <h2 class="section-title">Security is the product, not a footnote.</h2>
            <p class="section-lede">
                Porthole ships closed by default. You open only the surfaces you mean to open.
            </p>
            <div class="security-points">
                <div>
                    <h3>No permissive defaults</h3>
                    <p>
                        Define gates before the package boots. There is no built-in “allow everyone” path.
                        Missing <code>viewPorthole</code> or a source gate denies the call.
                        Institution-admin style roles are not assumed — these are staff ops gates.
                    </p>
                </div>
                <div>
                    <h3>HTTP auth is explicit</h3>
                    <p>
                        Point <code>auth.middleware</code> at the guard your MCP clients already use
                        (<code>auth:api</code>, <code>auth:sanctum</code>, etc.). With the Porthole OAuth issuer off,
                        an empty middleware list means the HTTP route is <strong>not</strong> registered —
                        including when <code>auth.http_required</code> is false.
                    </p>
                </div>
                <div>
                    <h3>OAuth is opt-in and scoped</h3>
                    <p>
                        Porthole’s issuer at <code>/porthole/oauth</code> stays off until
                        <code>oauth.enabled</code> is true (and local, unless <code>allow_non_local</code>).
                        Tokens live in Porthole’s tables with an <code>mcp:use</code> scope —
                        they are not your application’s Passport/Sanctum API tokens.
                    </p>
                </div>
                <div>
                    <h3>Stdio trust is local-only</h3>
                    <p>
                        Stdio registers only when <code>APP_ENV=local</code> and <code>stdio.enabled</code> is true.
                        Setting <code>auth.stdio_required</code> to false trusts the local process for tool calls;
                        it does not open HTTP.
                    </p>
                </div>
                <div>
                    <h3>Payloads are reduced before they leave</h3>
                    <p>
                        Horizon job payloads shrink to display names. Telescope strips query bindings, cookies,
                        authorization headers, and trace arguments. Sensitive keys
                        (<code>password</code>, <code>token</code>, <code>secret</code>, and related) become
                        <code>[redacted]</code>. SQL literals and absolute URL query strings are masked.
                        This is redaction for agent consumption — not a tenant isolation boundary.
                    </p>
                </div>
                <div>
                    <h3>Writes are absent until enabled</h3>
                    <p>
                        <code>writes_enabled</code> and <code>destructive_enabled</code> keep mutate/prune tools
                        out of <code>tools/list</code> until you flip them. Retries still need a display-name
                        allowlist; prune respects retention floors outside local.
                    </p>
                </div>
            </div>
            <p class="footnote">
                Full authorization, OAuth, and redaction detail lives in the
                <a href="https://github.com/chkltlabs/laravel-porthole#authorization">package README</a>.
            </p>
        </div>
    </section>

    <section id="getting-started" class="section reveal">
        <div class="section-inner">
            <p class="section-kicker">Getting started</p>
            <h2 class="section-title">Install, gate, connect.</h2>
            <p class="section-lede">
                Basic path below. Client-specific MCP config blocks (Cursor, VS Code, Claude Code, and more)
                are documented in the
                <a href="https://github.com/chkltlabs/laravel-porthole#connect-an-ai-coding-agent">GitHub README</a>.
            </p>

            <div class="steps">
                <div class="step">
                    <h3>1. Require the package</h3>
                    <pre><code>composer require chkltlabs/laravel-porthole</code></pre>
                    <p>
                        Then publish config if needed:
                    </p>
                    <pre><code>php artisan vendor:publish --tag=porthole-config</code></pre>
                </div>

                <div class="step">
                    <h3>2. Define gates before boot</h3>
                    <pre><code>use App\Models\User;
use Illuminate\Support\Facades\Gate;

Gate::define('viewPorthole', function (User $user): bool {
    return $user->hasRole('staff');
});

Gate::define('mutateHorizon', function (User $user): bool {
    return $user->hasRole('staff');
});</code></pre>
                    <p>
                        Horizon, Pulse, and Telescope still apply their own gates. A caller needs both
                        <code>viewPorthole</code> and the source gate. Adjust the role check to match your app —
                        <code>hasRole('staff')</code> is an example, not a package dependency.
                    </p>
                </div>

                <div class="step">
                    <h3>3. Choose a transport</h3>
                    <p><strong>Local stdio</strong> (laptop / same machine, <code>APP_ENV=local</code>):</p>
                    <pre><code>{
  "command": "php",
  "args": ["artisan", "mcp:start", "porthole"],
  "cwd": "/absolute/path/to/your-app"
}</code></pre>
                    <p>
                        On stdio there is normally no logged-in user. For local trust, set
                        <code>auth.stdio_required</code> to <code>false</code> (HTTP stays authenticated),
                        or use HTTP with a token instead.
                    </p>
                    <p><strong>HTTP with a fixed bearer token</strong>:</p>
                    <pre><code>{
  "url": "https://your-app.test/mcp/porthole",
  "headers": {
    "Authorization": "Bearer YOUR_ACCESS_TOKEN"
  }
}</code></pre>
                    <p>
                        Configure <code>auth.middleware</code> (for example <code>auth:sanctum</code> or <code>auth:api</code>)
                        in <code>config/porthole.php</code>. For Porthole OAuth, omit the bearer header and follow the
                        README’s OAuth section — do not put the issuer URL in the client’s <code>url</code> field.
                    </p>
                </div>

                <div class="step">
                    <h3>4. Confirm the server</h3>
                    <pre><code>php artisan list mcp</code></pre>
                    <p>
                        Restart / reload MCP in your client so it picks up the server, then list tools.
                        Read tools appear for each installed source.
                    </p>
                </div>
            </div>

            <p class="footnote">
                Endpoint: <code>POST /mcp/porthole</code>.
                Deeper setup, troubleshooting, and the full tool catalog:
                <a href="https://github.com/chkltlabs/laravel-porthole">github.com/chkltlabs/laravel-porthole</a>.
            </p>
        </div>
    </section>
@endsection
