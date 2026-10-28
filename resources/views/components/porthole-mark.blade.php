<svg class="porthole-mark" viewBox="0 0 420 420" role="img" aria-label="Porthole mark: brass ring framing a sea horizon">
    <defs>
        <radialGradient id="ph-glass" cx="42%" cy="38%" r="62%">
            <stop offset="0%" stop-color="#9ec4cf" stop-opacity="0.35" />
            <stop offset="45%" stop-color="#1d4b5c" stop-opacity="0.55" />
            <stop offset="100%" stop-color="#071018" stop-opacity="0.95" />
        </radialGradient>
        <linearGradient id="ph-brass-ring" x1="20%" y1="8%" x2="80%" y2="92%">
            <stop offset="0%" stop-color="#ead7a0" />
            <stop offset="35%" stop-color="#c9a24a" />
            <stop offset="70%" stop-color="#8d6a24" />
            <stop offset="100%" stop-color="#e2c478" />
        </linearGradient>
        <linearGradient id="ph-sea" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="#6f93a3" />
            <stop offset="38%" stop-color="#2b6173" />
            <stop offset="62%" stop-color="#123847" />
            <stop offset="100%" stop-color="#07161f" />
        </linearGradient>
        <linearGradient id="ph-sweep" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#ffffff" stop-opacity="0" />
            <stop offset="45%" stop-color="#d7eef5" stop-opacity="0.55" />
            <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
        </linearGradient>
        <clipPath id="ph-aperture">
            <circle cx="210" cy="210" r="132" />
        </clipPath>
    </defs>

    {{-- Outer bolts / flange --}}
    <circle cx="210" cy="210" r="198" fill="url(#ph-brass-ring)" />
    <circle cx="210" cy="210" r="178" fill="var(--ph-depth, #0a1c28)" />
    <circle cx="210" cy="210" r="168" fill="url(#ph-brass-ring)" />
    <circle cx="210" cy="210" r="146" fill="#0a1620" />

    @foreach ([22, 67, 112, 157, 202, 247, 292, 337] as $deg)
        <circle
            cx="{{ 210 + 188 * cos(deg2rad($deg)) }}"
            cy="{{ 210 + 188 * sin(deg2rad($deg)) }}"
            r="7.5"
            fill="#7a5c1e"
            stroke="#e2c478"
            stroke-width="1.5"
        />
    @endforeach

    <g clip-path="url(#ph-aperture)">
        <rect class="porthole-horizon" x="78" y="78" width="264" height="264" fill="url(#ph-sea)" />
        <path
            class="porthole-ripple"
            d="M70 232 C120 214, 160 250, 210 232 S300 214, 350 236 L350 350 L70 350 Z"
            fill="#0c2430"
            opacity="0.85"
        />
        <path
            class="porthole-ripple"
            d="M70 246 C130 262, 170 228, 220 248 S300 268, 350 250"
            fill="none"
            stroke="#7fb0bb"
            stroke-opacity="0.35"
            stroke-width="2"
        />
        <ellipse cx="160" cy="150" rx="42" ry="18" fill="#cfe3ea" opacity="0.18" />
        <rect class="porthole-glass-sweep" x="70" y="70" width="280" height="280" fill="url(#ph-sweep)" />
        <circle cx="210" cy="210" r="132" fill="url(#ph-glass)" />
    </g>

    <circle cx="210" cy="210" r="136" fill="none" stroke="#e8d7a2" stroke-opacity="0.55" stroke-width="3" />
    <circle cx="210" cy="210" r="142" fill="none" stroke="#5d4718" stroke-opacity="0.65" stroke-width="2" />
</svg>
