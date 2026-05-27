<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Campeones - Road To The Nexo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black text-white min-h-screen">

<header class="border-b border-yellow-700 bg-[#090909]">

    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">

        <a href="/" class="flex items-center gap-4">

            <img src="{{ asset('images/logo.png') }}"
                 class="w-14 h-14 rounded-full">

            <h1 class="text-4xl font-black text-yellow-400">
                Road To The Nexo
            </h1>

        </a>

        <a href="{{ route('champions.create') }}"
           class="bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-lg font-bold">
            Crear Campeón
        </a>

    </div>

</header>

<section class="max-w-7xl mx-auto px-8 py-16">

    <h2 class="text-5xl font-black text-yellow-400 mb-4">
        Campeones
    </h2>

    <p class="text-gray-400 mb-12 text-xl">
        Explora todos los campeones disponibles.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($champions as $champion)

            <div class="bg-[#111111] border border-yellow-700 rounded-2xl overflow-hidden">

                <img src="{{ $champion->image }}"
                     class="w-full h-64 object-cover">

                <div class="p-6">

                    <h3 class="text-3xl font-black text-yellow-400 mb-3">
                        {{ $champion->name }}
                    </h3>

                    <p class="text-gray-300 mb-6">
                        {{ $champion->description }}
                    </p>

                    <div class="flex gap-3">

                        <a href="{{ route('champions.show', $champion) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg font-bold">
                            Ver
                        </a>

                        <a href="{{ route('champions.edit', $champion) }}"
                           class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg font-bold">
                            Editar
                        </a>

                        <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg font-bold">
                            Eliminar
                        </button>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>

</body>
</html>
