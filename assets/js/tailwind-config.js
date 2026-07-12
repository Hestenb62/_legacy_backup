tailwind.config = {
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", "ui-sans-serif", "system-ui", "-apple-system", "sans-serif"],
                dyslexic: ['"Open Dyslexic"', 'sans-serif'],
                mono: ['"Roboto Mono"', 'monospace'],
                handwriting: ['"Cookie"', 'cursive'],
                outfit: ['"Outfit"', 'sans-serif'],
                inter: ['"Inter"', 'sans-serif'],
                lexend: ['"Lexend"', 'sans-serif'],
                comicneue: ['"Comic Neue"', 'sans-serif'],
            },
            colors: {
                'primary': 'var(--color-primary)',
                'secondary': 'var(--color-secondary)',
                'accent': 'var(--color-accent)',
                'base-bg': 'var(--color-base-bg)',
                'content-bg': 'var(--color-content-bg)',
                'text-default': 'var(--color-text-default)',
                'text-secondary': 'var(--color-text-secondary)',
                'header-bg': 'var(--color-header-bg)',
                // Compatibility Aliases
                'card-bg': 'var(--color-content-bg)',
                'text-primary': 'var(--color-text-default)',
                'text-text-primary': 'var(--color-text-default)',
            },
            borderRadius: {
                'base-rounded': '1.5rem',
                'DEFAULT': '0.75rem',
                'lg': '1rem',
                'xl': '1.5rem',
                '2xl': '2rem',
                '3xl': '2.5rem',
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.5s ease-out forwards',
                'bounce-short': 'bounceShort 1s ease-in-out',
                'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'float': 'float 6s ease-in-out infinite',
                'reveal': 'revealUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
            },
            keyframes: {
                fadeInUp: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
                bounceShort: {
                    '0%, 100%': {
                        transform: 'translateY(0)'
                    },
                    '50%': {
                        transform: 'translateY(-10px)'
                    },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                revealUp: {
                    'from': { opacity: '0', transform: 'translateY(30px)' },
                    'to': { opacity: '1', transform: 'translateY(0)' },
                }
            }
        },
    },
};
