<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <meta name="theme-color" content="#010034">
    <style>
        :root {
            --ink: #010034;
            --blue: #004dbe;
            --white: #ffffff;
            --ink-60: rgba(1, 0, 52, 0.6);
            --card-bg: rgba(255, 255, 255, 0.08);
            --card-border: rgba(255, 255, 255, 0.18);
        }

        html,
        body {
            margin: 0;
            overflow-x: hidden;
        }

        .bg-grid2 {
            margin: 0;
            color: var(--white);
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            background: radial-gradient(1200px 800px at 80% -10%, rgba(0, 77, 190, 0.25), transparent 60%),
                radial-gradient(900px 600px at -10% 110%, rgba(0, 77, 190, 0.22), transparent 60%),
                linear-gradient(160deg, var(--ink) 0%, #021052 35%, var(--blue) 120%);
            display: grid;
            place-items: center;
            overflow: hidden;
            height: 100vh;
        }

        /* Subtle grid + film grain for depth */
        .bg-grid::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            background-image:
                radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.06) 1px, transparent 0),
                radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.04) 1px, transparent 0);
            background-size: 24px 24px, 12px 12px;
            mix-blend-mode: screen;
            opacity: .25;
        }

        .bg-grid::after {
            content: "";
            position: fixed;
            inset: -100px;
            pointer-events: none;
            z-index: 0;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" viewBox="0 0 140 140"><filter id="n"><feTurbulence type="fractalNoise" baseFrequency="0.65" numOctaves="2" stitchTiles="stitch"/></filter><rect width="100%" height="100%" filter="url(%23n)" opacity="0.08"/></svg>');
        }

        /* Decorative ambient orbs */
        .bg-blob {
            position: absolute;
            filter: blur(40px);
            opacity: 0.35;
            pointer-events: none;
        }

        .blob-a {
            width: 380px;
            height: 380px;
            background: #2a7bff;
            top: -80px;
            right: 0px;
            border-radius: 50%;
            animation: float 12s ease-in-out infinite;
        }

        .blob-b {
            width: 520px;
            height: 520px;
            background: #0b1a72;
            bottom: 0px;
            left: 0px;
            border-radius: 50%;
            animation: float 14s ease-in-out infinite reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
            }

            50% {
                transform: translate3d(0, -14px, 0) scale(1.03);
            }
        }

        .container {
            position: relative;
            width: min(920px, 92vw);
            padding: 28px;
        }

        .card {
            position: relative;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 48px clamp(24px, 6vw, 56px);
            backdrop-filter: blur(10px) saturate(120%);
            -webkit-backdrop-filter: blur(10px) saturate(120%);
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.35), inset 0 1px 0 rgba(255, 255, 255, 0.06);
            z-index: 1;
        }

        /* Animated gradient border ring */
        .card::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 22px;
            padding: 1px;
            background: conic-gradient(from 180deg at 50% 50%, rgba(255, 255, 255, .35), rgba(0, 77, 190, .65), rgba(255, 255, 255, .35));
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            animation: spin 10s linear infinite;
            pointer-events: none;
        }

       

        .accent-bar {
            position: absolute;
            inset: 0;
            border-radius: 20px;
            pointer-events: none;
            mask: linear-gradient(transparent 38px, black 38px);
        }

        .accent-bar::before {
            content: "";
            position: absolute;
            left: 24px;
            right: 24px;
            top: 18px;
            height: 2px;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.05));
            filter: blur(0.3px);
        }

        .header {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 22px;
            align-items: center;
        }

        .badge {
            width: 68px;
            height: 68px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(0, 77, 190, 0.95), rgba(0, 77, 190, 0.55));
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow: inset 0 0 18px rgba(255, 255, 255, 0.18), 0 8px 22px rgba(0, 0, 0, 0.28);
        }

        .title {
            margin: 0 0 6px 0;
            font-size: clamp(28px, 4vw, 42px);
            letter-spacing: 0.2px;
            line-height: 1.15;
            background: linear-gradient(90deg, #ffffff, #a6c4ff 40%, #6ea0ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .subtitle {
            margin: 0;
            color: rgba(255, 255, 255, 0.8);
            font-size: clamp(15px, 2.2vw, 17px);
            line-height: 1.6;
        }

        .divider {
            height: 1px;
            margin: 30px 0;
            border: none;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.22), transparent);
        }

        .cta-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            height: 48px;
            padding: 0 18px;
            border-radius: 12px;
            border: 1px solid transparent;
            font-weight: 600;
            letter-spacing: 0.2px;
            transition: transform 120ms ease, box-shadow 180ms ease, border-color 180ms ease, background-color 180ms ease;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            color: var(--white);
            background: linear-gradient(135deg, #0e5ae6, var(--blue));
            box-shadow: 0 10px 24px rgba(0, 77, 190, 0.35);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 28px rgba(0, 77, 190, 0.42);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-ghost {
            color: var(--white);
            background: transparent;
            border-color: rgba(255, 255, 255, 0.28);
        }

        .btn-ghost:hover {
            border-color: rgba(255, 255, 255, 0.45);
            background: rgba(255, 255, 255, 0.05);
        }

        .chip-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 16px;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.16);
            font-size: 13px;
            color: rgba(255, 255, 255, 0.9);
        }

        .chip svg {
            opacity: .9;
        }

      

        .meta {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin: 22px 0 0 0;
        }

        .meta-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 14px;
            padding: 14px;
        }

        .meta-item h4 {
            margin: 0 0 4px 0;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.85);
        }

        .meta-item p {
            margin: 0;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.72);
            line-height: 1.5;
        }

        /* Confetti sprinkles */
        .confetti {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .confetti i {
            position: absolute;
            width: 6px;
            height: 12px;
            opacity: 0.85;
            border-radius: 2px;
            transform: translateY(-120%);
            animation: drop 3.6s ease-in infinite;
        }

        .confetti i:nth-child(3n) {
            width: 8px;
            height: 10px;
        }

        .confetti i:nth-child(4n) {
            width: 4px;
            height: 14px;
        }

        .confetti i:nth-child(5n) {
            border-radius: 50%;
            width: 8px;
            height: 8px;
        }

        @keyframes drop {
            to {
                transform: translateY(140vh) rotate(540deg);
            }
        }

        /* Subtle shimmering line under the header */
        .sheen {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 3px;
            overflow: hidden;
            border-radius: 20px 20px 0 0;
        }

        .sheen::before {
            content: "";
            position: absolute;
            left: -40%;
            top: 0;
            width: 40%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .85), transparent);
            filter: blur(3px);
            animation: sheen 4s ease-in-out infinite;
        }

        @keyframes sheen {
            0% {
                left: -40%;
            }

            50% {
                left: 100%;
            }

            100% {
                left: 100%;
            }
        }

        .footer-note {
            margin-top: 18px;
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Smaller screens */
        @media (max-width: 520px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .badge {
                width: 60px;
                height: 60px;
                border-radius: 14px;
            }

            .cta-row {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                height: 46px;
            }

            .meta {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="bg-grid bg-grid2">
    <div class="bg-blob blob-a"></div>
    <div class="bg-blob blob-b"></div>

    <div class="container">
        <div class="card">
            <div class="sheen"></div>
            <div class="accent-bar"></div>

            <div class="layout">
                <div>
                    <div class="header">
                        <div class="badge" aria-hidden="true">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M20 7L9 18L4 13" stroke="white" stroke-width="2.2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="title">{{ $thank->getLocalizedThankTitle() ?? "You're in. Welcome aboard!" }}</h1>
                            <p class="subtitle">{{ $thank->getLocalizedThankSubtitle() ?? "Thank you for submitting your details. Your space is ready and we're setting everything up for you. Explore what's next below." }}</p>
                        </div>
                    </div>

                    <div class="chip-row" aria-hidden="true">
                        <a class="btnActionA btnPrimaryActionA" href="tel:+31615865040'" aria-label="Call us at {{ $thank->getLocalizedChip1() ?? '+31615865040' }}">
                        <span class="chip">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3v18M3 12h18" stroke="#a8c1ff" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            {{ $thank->getLocalizedChip1() ?? '+31615865040' }}
                        </span>
                        </a>
                        <a class="btnActionA btnPrimaryActionA" href="mailto:info@zalvant.com" aria-label="Call us at {{{ $thank->getLocalizedChip2() ?? 'info@zalvant.com' }}}">
                        <span class="chip">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 7h16M4 12h16M4 17h10" stroke="#a8c1ff" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            {{ $thank->getLocalizedChip2() ?? 'info@zalvant.com' }}
                        </span>
                        </a>
                        <span class="chip">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2l3 7h7l-5.5 4 2 7L12 17l-6.5 3 2-7L2 9h7l3-7z" stroke="#a8c1ff"
                                    stroke-width="2" stroke-linejoin="round" />
                            </svg>
                            {{ $thank->getLocalizedChip3() ?? 'Priority support' }}
                        </span>
                    </div>

                    <hr class="divider">

                    <div class="cta-row">
                                                <a class="btn btn-ghost" href="{{route('home.index')}}" role="button" aria-label="Back to home">
                            {{ $thank->getLocalizedButtonText() ?? 'Back to Home' }}
                        </a>
                    </div>

                   
                </div>

            </div>
        </div>
        <div class="confetti" aria-hidden="true" id="confetti"></div>
    </div>
</div>
    <script>
        // Lightweight confetti: create a few pieces with varied colors from the palette
        (function () {
            const root = document.getElementById('confetti');
            if (!root) return;
            const colors = ['#ffffff', '#7aa8ff', '#2c6be6', '#89b2ff'];
            const total = 36;
            for (let i = 0; i < total; i++) {
                const p = document.createElement('i');
                p.style.left = Math.random() * 100 + 'vw';
                p.style.animationDelay = (Math.random() * 2.2) + 's';
                p.style.animationDuration = (3 + Math.random() * 2) + 's';
                p.style.background = colors[Math.floor(Math.random() * colors.length)];
                p.style.transform = 'translateY(' + (-10 - Math.random() * 30) + 'vh)';
                root.appendChild(p);
            }
        })();
    </script>
</body>

</html>