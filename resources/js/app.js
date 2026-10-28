const THEME_KEY = 'porthole-theme';

function resolveTheme(preference) {
    if (preference === 'light' || preference === 'dark') {
        return preference;
    }

    return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
}

function applyTheme(preference) {
    const resolved = resolveTheme(preference);
    document.documentElement.setAttribute('data-theme', resolved);
    document.documentElement.setAttribute('data-theme-preference', preference);

    document.querySelectorAll('[data-theme-choice]').forEach((button) => {
        button.setAttribute('aria-pressed', String(button.dataset.themeChoice === preference));
    });
}

function initThemeControls() {
    // Dark by default; light and system are explicit choices.
    let preference = 'dark';

    try {
        const stored = localStorage.getItem(THEME_KEY);
        if (stored === 'light' || stored === 'dark' || stored === 'system') {
            preference = stored;
        }
    } catch {
        // localStorage may be unavailable
    }

    applyTheme(preference);

    document.querySelectorAll('[data-theme-choice]').forEach((button) => {
        button.addEventListener('click', () => {
            const next = button.dataset.themeChoice;
            if (next !== 'light' && next !== 'dark' && next !== 'system') {
                return;
            }

            preference = next;

            try {
                localStorage.setItem(THEME_KEY, preference);
            } catch {
                // ignore
            }

            applyTheme(preference);
        });
    });

    window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', () => {
        const current = document.documentElement.getAttribute('data-theme-preference') || 'system';
        if (current === 'system') {
            applyTheme('system');
        }
    });
}

function initReveal() {
    const nodes = document.querySelectorAll('.reveal');
    if (!nodes.length) {
        return;
    }

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        nodes.forEach((node) => node.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.16, rootMargin: '0px 0px -8% 0px' },
    );

    nodes.forEach((node) => observer.observe(node));
}

document.addEventListener('DOMContentLoaded', () => {
    initThemeControls();
    initReveal();
});
