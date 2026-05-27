<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $champion->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black text-white">

<header class="border-b border-yellow-700 bg-[#090909]">

    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">

        <a href="/" class="flex items-center gap-4">

            <img src="{{ asset('images/logo.png') }}"
                 class="w-14 h-14 rounded-full">

            <h1 class="text-4xl font-black text-yellow-400">
                Road To The Nexo
            </h1>

        </a>

        <a href="{{ route('champions.index') }}"
           class="text-yellow-400 font-bold">
            Volver
        </a>

    </div>

</header>

<section class="max-w-7xl mx-auto px-8 py-16">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <img src="{{ $champion->image }}"
             class="rounded-2xl border border-yellow-700">

        <div>

            <h1 class="text-6xl font-black text-yellow-400 mb-6">
                {{ $champion->name }}
            </h1>

            <p class="text-2xl text-gray-300 mb-6">
                {{ $champion->description }}
            </p>

            <div class="text-xl">

                <span class="text-red-400 font-bold">
                    Rol:
                </span>

                {{ $champion->role }}

            </div>

        </div>

    </div>

    <section class="mt-24">

        <h2 class="text-5xl font-black text-yellow-400 mb-10">
            Habilidades
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

            @foreach($champion->abilities as $ability)

                <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-4">

                    <img src="{{ $ability->image }}"
                         class="w-full h-32 object-cover rounded-xl mb-4">

                    <h3 class="text-2xl font-bold text-yellow-400 mb-2">
                        {{ $ability->name }}
                    </h3>

                    <p class="text-gray-400">
                        {{ $ability->description }}
                    </p>

                </div>

            @endforeach

        </div>

    </section>

</section>

</body>
</html>
