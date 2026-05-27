<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Road To The Nexo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background:
                radial-gradient(circle at top, #1b1b1b 0%, #090909 60%);
        }

        .hero-bg {
            background:
                linear-gradient(to right,
                rgba(0,0,0,0.92) 15%,
                rgba(0,0,0,0.55) 55%,
                rgba(0,0,0,0.85) 100%
                ),
                url('https://images8.alphacoders.com/992/992224.jpg');

            background-size: cover;
            background-position: center;
        }

        .gold-border {
            border: 1px solid rgba(200, 155, 60, 0.25);
        }

        .card-bg {
            background: rgba(20,20,20,0.95);
            backdrop-filter: blur(10px);
        }

        .hover-card {
            transition: 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            border-color: rgba(200,155,60,0.7);
        }
    </style>
</head>

<body class="text-white overflow-x-hidden">

<!-- NAVBAR -->
<nav class="fixed top-0 z-50 w-full bg-black/60 backdrop-blur-md border-b border-yellow-700/10">

    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LOGO -->
        <div class="flex items-center gap-3">

            <img
                src="{{ asset('images/logo.png') }}"
                class="w-11 h-11 rounded-full object-cover"
                alt="logo"
            >

            <h1 class="text-3xl font-black text-yellow-500">
                Road To The Nexo
            </h1>

        </div>

        <!-- BUTTONS -->
        <div class="flex items-center gap-4">

            <a
                href="{{ route('login') }}"
                class="px-6 py-2 rounded-full border border-yellow-600 text-yellow-500 hover:bg-yellow-600 hover:text-black transition font-semibold"
            >
                Login
            </a>

            <a
                href="{{ route('register') }}"
                class="px-6 py-2 rounded-full bg-red-800 hover:bg-red-700 transition font-semibold"
            >
                Registro
            </a>

        </div>

    </div>

</nav>

<!-- HERO -->
<section class="hero-bg min-h-screen flex items-center">

    <div class="max-w-7xl mx-auto px-6 w-full">

        <div class="max-w-3xl pt-20">

            <p class="uppercase tracking-[0.35em] text-yellow-500 text-sm mb-6">
                La guía definitiva para League of Legends
            </p>

            <h1 class="text-6xl md:text-8xl font-black leading-none mb-8">

                Aprende League of Legends

                <span class="text-yellow-500">
                    desde cero.
                </span>

            </h1>

            <p class="text-gray-300 text-xl leading-relaxed max-w-2xl mb-10">
                Descubre campeones, roles, objetos, hechizos y estrategias
                para convertirte en un mejor jugador dentro de la
                Grieta del Invocador.
            </p>

            <div class="flex flex-wrap gap-5">

                <a
                    href="{{ route('register') }}"
                    class="bg-yellow-600 hover:bg-yellow-500 text-black px-10 py-4 rounded-xl font-black transition"
                >
                    EMPEZAR AHORA
                </a>

            </div>

        </div>

    </div>

</section>

<!-- FEATURES -->
<section class="py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-20">

            <h2 class="text-5xl font-black text-yellow-500 mb-6">
                Todo lo que necesitas para mejorar
            </h2>

            <p class="text-gray-400 text-lg">
                Aprende las bases de League of Legends con herramientas,
                estadísticas y guías.
            </p>

        </div>

        <!-- MINI CARDS -->
        <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-7 gap-5 mb-20">

            @php
                $cards = [
                    'Campeones',
                    'Objetos',
                    'Roles',
                    'Hechizos',
                    'Modos',
                    'Randomizador',
                    'TierLists'
                ];
            @endphp

            @foreach($cards as $card)

                <div class="card-bg gold-border rounded-2xl p-6 hover-card text-center">

                    <h3 class="text-yellow-500 font-bold text-lg mb-3">
                        {{ $card }}
                    </h3>

                    <p class="text-gray-400 text-sm leading-relaxed">

                        @switch($card)

                            @case('Campeones')
                                Descubre estadísticas y habilidades de cada campeón.
                                @break

                            @case('Objetos')
                                Aprende builds y combinaciones para cada partida.
                                @break

                            @case('Roles')
                                Entiende cómo se juega cada posición del juego.
                                @break

                            @case('Hechizos')
                                Domina Destello, Prender, Aplastar y más hechizos.
                                @break

                            @case('Modos')
                                Explora todos los modos de juego disponibles.
                                @break

                            @case('Randomizador')
                                Genera builds aleatorias divertidas.
                                @break

                            @case('TierLists')
                                Crea listas de campeones y metas.
                                @break

                        @endswitch

                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>

<!-- LOL INFO -->
<section class="py-28 border-t border-yellow-700/10">

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-start">

        <!-- LEFT -->
        <div>

            <p class="uppercase tracking-[0.35em] text-red-600 text-sm mb-6">
                ¿Qué es League of Legends?
            </p>

            <h2 class="text-6xl font-black leading-tight mb-8">
                Uno de los videojuegos
                más jugados del mundo.
            </h2>

            <p class="text-gray-400 text-xl leading-relaxed mb-6">
                League of Legends es un videojuego competitivo 5v5
                desarrollado por Riot Games donde dos equipos luchan
                por destruir el nexo enemigo.
            </p>

            <p class="text-gray-400 text-xl leading-relaxed">
                Cada jugador controla un campeón único con habilidades,
                roles y estilos de juego diferentes.
            </p>

        </div>

        <!-- RIGHT -->
        <div class="grid grid-cols-2 gap-6">

            <div class="card-bg gold-border rounded-3xl p-8 hover-card">

                <h3 class="text-5xl font-black text-yellow-500 mb-4">
                    +115M
                </h3>

                <p class="text-white text-xl font-bold mb-3">
                    Jugadores activos mensuales
                </p>

                <p class="text-gray-400 leading-relaxed">
                    League of Legends sigue siendo uno de los videojuegos
                    competitivos más jugados del planeta.
                </p>

            </div>

            <div class="card-bg gold-border rounded-3xl p-8 hover-card">

                <h3 class="text-5xl font-black text-red-500 mb-4">
                    +160
                </h3>

                <p class="text-white text-xl font-bold mb-3">
                    Campeones jugables
                </p>

                <p class="text-gray-400 leading-relaxed">
                    Cada campeón tiene habilidades, estilos
                    y estrategias completamente únicas.
                </p>

            </div>

            <div class="card-bg gold-border rounded-3xl p-8 hover-card">

                <h3 class="text-5xl font-black text-yellow-500 mb-4">
                    +200
                </h3>

                <p class="text-white text-xl font-bold mb-3">
                    Objetos para combinar
                </p>

                <p class="text-gray-400 leading-relaxed">
                    Miles de builds y combinaciones posibles
                    dependiendo de cada partida.
                </p>

            </div>

            <div class="card-bg gold-border rounded-3xl p-8 hover-card">

                <h3 class="text-5xl font-black text-red-500 mb-4">
                    +1860
                </h3>

                <p class="text-white text-xl font-bold mb-3">
                    Aspectos disponibles
                </p>

                <p class="text-gray-400 leading-relaxed">
                    Personaliza tus campeones favoritos
                    con skins y temáticas únicas.
                </p>

            </div>

            <div class="card-bg gold-border rounded-3xl p-8 hover-card col-span-2">

                <h3 class="text-4xl font-black text-yellow-500 mb-4">
                    Diferentes modos de juego
                </h3>

                <p class="text-gray-300 text-lg leading-relaxed">
                    Disfruta de Grieta del Invocador, ARAM,
                    Arena, Teamfight Tactics, URF,
                    Nexus Blitz y muchos modos temporales especiales.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- LOGIN ADVANTAGES -->
<section class="py-28 border-t border-yellow-700/10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-20">

            <h2 class="text-5xl font-black text-yellow-500 mb-6">
                Ventajas de iniciar sesión
            </h2>

            <p class="text-gray-400 text-lg">
                Crea tu cuenta gratuita y desbloquea funciones avanzadas.
            </p>

        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="card-bg gold-border rounded-3xl p-8 text-center hover-card">

                <h3 class="text-2xl font-black text-yellow-500 mb-4">
                    Favoritos
                </h3>

                <p class="text-gray-400">
                    Guarda tus campeones favoritos para acceder rápidamente.
                </p>

            </div>

            <div class="card-bg gold-border rounded-3xl p-8 text-center hover-card">

                <h3 class="text-2xl font-black text-red-500 mb-4">
                    Randomizador
                </h3>

                <p class="text-gray-400">
                    Acceso completo al randomizador de builds y campeones.
                </p>

            </div>

            <div class="card-bg gold-border rounded-3xl p-8 text-center hover-card">

                <h3 class="text-2xl font-black text-yellow-500 mb-4">
                    TierLists
                </h3>

                <p class="text-gray-400">
                    Guarda tus TierLists personalizadas.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="border-t border-yellow-700/10 py-10 bg-black">

    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6">

        <div class="flex items-center gap-4">

            <img
                src="{{ asset('images/logo.png') }}"
                class="w-12 h-12 rounded-full"
                alt="logo"
            >

            <div>

                <h3 class="text-2xl font-black text-yellow-500">
                    Road To The Nexo
                </h3>

                <p class="text-gray-500 text-sm">
                    Proyecto TFG DAW
                </p>

            </div>

        </div>

        <div class="flex gap-8 text-gray-400 text-sm">

            <a href="#" class="hover:text-yellow-500 transition">
                Login
            </a>

            <a href="#" class="hover:text-yellow-500 transition">
                Registro
            </a>

            <a href="#" class="hover:text-yellow-500 transition">
                Privacidad
            </a>

            <a href="#" class="hover:text-yellow-500 transition">
                Aviso legal
            </a>

        </div>

    </div>

</footer>

</body>
</html>
