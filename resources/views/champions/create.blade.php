<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Campeón</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white min-h-screen">

    {{-- HEADER --}}
    <header class="border-b border-yellow-600 bg-[#050505]">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="{{ route('items.index') }}"
               class="flex items-center gap-4">

                <img src="{{ asset('images/logo.png') }}"
                     class="w-14 h-14 rounded-full">

                <h1 class="text-4xl font-black text-yellow-400">
                    Road To The Nexo
                </h1>

            </a>

            <a href="{{ route('champions.index') }}"
               class="bg-gray-700 hover:bg-gray-600 px-5 py-3 rounded-xl font-bold">
                Volver
            </a>

        </div>
    </header>

<div class="max-w-5xl mx-auto py-16 px-8">

    <div class="flex items-center justify-between mb-10">

        <h1 class="text-5xl font-black text-yellow-400">
            Crear Campeón
        </h1>

    </div>

    <form action="{{ route('champions.store') }}"
          method="POST"
          class="space-y-10">

        @csrf

        <!-- DATOS PRINCIPALES -->
        <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-8">

            <h2 class="text-3xl font-black text-yellow-400 mb-8">
                Información principal
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block mb-2 font-bold">Nombre</label>

                    <input type="text"
                           name="name"
                           class="w-full bg-black border border-yellow-700 rounded-xl p-4">
                </div>

                <div>
                    <label class="block mb-2 font-bold">Rol</label>

                    <select name="role"
                            class="w-full bg-black border border-yellow-700 rounded-xl p-4">

                        <option>Mago</option>
                        <option>Luchador</option>
                        <option>Tanque</option>
                        <option>Asesino</option>
                        <option>Soporte</option>
                        <option>Tirador</option>

                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-bold">Región</label>

                    <input type="text"
                           name="region"
                           class="w-full bg-black border border-yellow-700 rounded-xl p-4">
                </div>

                <div>
                    <label class="block mb-2 font-bold">Tipo de daño</label>

                    <select name="damage_type"
                            class="w-full bg-black border border-yellow-700 rounded-xl p-4">

                        <option>Físico</option>
                        <option>Mágico</option>
                        <option>Mixto</option>

                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-bold">Recurso</label>

                    <select name="resource"
                            class="w-full bg-black border border-yellow-700 rounded-xl p-4">

                        <option>Mana</option>
                        <option>Energía</option>
                        <option>Furia</option>
                        <option>Flujo</option>
                        <option>Ninguno</option>

                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-bold">Año lanzamiento</label>

                    <input type="number"
                           name="release_year"
                           class="w-full bg-black border border-yellow-700 rounded-xl p-4">
                </div>

            </div>

            <div class="mt-6">

                <label class="block mb-2 font-bold">
                    Descripción
                </label>

                <textarea name="description"
                          rows="5"
                          class="w-full bg-black border border-yellow-700 rounded-xl p-4"></textarea>

            </div>

            <div class="mt-6">

                <label class="block mb-2 font-bold">
                    Imagen principal
                </label>

                <input type="text"
                       name="image"
                       class="w-full bg-black border border-yellow-700 rounded-xl p-4">

            </div>

        </div>

        <!-- HABILIDADES -->
        <div class="bg-[#111111] border border-blue-700 rounded-2xl p-8">

            <h2 class="text-3xl font-black text-blue-400 mb-8">
                Habilidades
            </h2>

            @for($i = 1; $i <= 5; $i++)

                <div class="border border-gray-700 rounded-2xl p-6 mb-6">

                    <h3 class="text-2xl font-bold mb-6">
                        Habilidad {{ $i }}
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <input type="text"
                               name="abilities[{{ $i }}][name]"
                               placeholder="Nombre"
                               class="bg-black border border-gray-700 rounded-xl p-4">

                        <input type="text"
                               name="abilities[{{ $i }}][image]"
                               placeholder="URL Imagen"
                               class="bg-black border border-gray-700 rounded-xl p-4">

                        <input type="text"
                               name="abilities[{{ $i }}][video]"
                               placeholder="URL Vídeo"
                               class="bg-black border border-gray-700 rounded-xl p-4 md:col-span-2">

                        <textarea
                            name="abilities[{{ $i }}][description]"
                            placeholder="Descripción"
                            rows="3"
                            class="bg-black border border-gray-700 rounded-xl p-4 md:col-span-2"></textarea>

                    </div>

                </div>

            @endfor

        </div>

        <!-- SKINS -->
        <div class="bg-[#111111] border border-red-700 rounded-2xl p-8">

            <h2 class="text-3xl font-black text-red-400 mb-8">
                Aspectos
            </h2>

            <div id="skins-container">

                <!-- ASPECTO 1 -->
                <div class="border border-gray-700 rounded-2xl p-6 mb-6 skin-block">

                    <h3 class="text-2xl font-bold mb-6">
                        Aspecto 1
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <input type="text"
                               name="skins[0][name]"
                               placeholder="Nombre"
                               class="bg-black border border-gray-700 rounded-xl p-4">

                        <input type="number"
                               name="skins[0][price]"
                               placeholder="Precio RP"
                               class="bg-black border border-gray-700 rounded-xl p-4">

                        <input type="text"
                               name="skins[0][image]"
                               placeholder="URL Imagen"
                               class="bg-black border border-gray-700 rounded-xl p-4 md:col-span-2">

                    </div>

                </div>

            </div>

            <button type="button"
                    id="add-skin-btn"
                    class="mt-4 bg-red-500 hover:bg-red-600 px-6 py-3 rounded-xl font-bold">

                Añadir Aspecto

            </button>

        </div>

        <button class="bg-yellow-500 hover:bg-yellow-600 text-black px-8 py-4 rounded-xl font-black text-xl">
            Guardar Campeón
        </button>

    </form>

</div>

<script>

    let skinIndex = 1;

    document.getElementById('add-skin-btn').addEventListener('click', function () {

        const container = document.getElementById('skins-container');

        const block = document.createElement('div');

        block.classList.add(
            'border',
            'border-gray-700',
            'rounded-2xl',
            'p-6',
            'mb-6',
            'skin-block'
        );

        block.innerHTML = `

            <h3 class="text-2xl font-bold mb-6">
                Aspecto ${skinIndex + 1}
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <input type="text"
                       name="skins[${skinIndex}][name]"
                       placeholder="Nombre"
                       class="bg-black border border-gray-700 rounded-xl p-4">

                <input type="number"
                       name="skins[${skinIndex}][price]"
                       placeholder="Precio RP"
                       class="bg-black border border-gray-700 rounded-xl p-4">

                <input type="text"
                       name="skins[${skinIndex}][image]"
                       placeholder="URL Imagen"
                       class="bg-black border border-gray-700 rounded-xl p-4 md:col-span-2">

            </div>
        `;

        container.appendChild(block);

        skinIndex++;

    });

</script>

</body>
</html>
