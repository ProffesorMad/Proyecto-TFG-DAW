<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Campeón</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white min-h-screen">

<div class="max-w-5xl mx-auto py-16 px-8">

    <div class="flex items-center justify-between mb-10">

        <h1 class="text-5xl font-black text-yellow-400">
            Editar Campeón
        </h1>

        <a href="{{ route('champions.index') }}"
           class="bg-gray-700 hover:bg-gray-600 px-5 py-3 rounded-xl font-bold">
            Volver
        </a>

    </div>

    <form action="{{ route('champions.update', $champion) }}"
          method="POST"
          class="space-y-10">

        @csrf
        @method('PUT')

        <!-- INFORMACIÓN PRINCIPAL -->
        <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-8">

            <h2 class="text-3xl font-black text-yellow-400 mb-8">
                Información principal
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block mb-2 font-bold">Nombre</label>

                    <input type="text"
                           name="name"
                           value="{{ $champion->name }}"
                           class="w-full bg-black border border-yellow-700 rounded-xl p-4">
                </div>

                <div>
                    <label class="block mb-2 font-bold">Rol</label>

                    <select name="role"
                            class="w-full bg-black border border-yellow-700 rounded-xl p-4">

                        <option value="Mago" {{ $champion->role == 'Mago' ? 'selected' : '' }}>Mago</option>
                        <option value="Luchador" {{ $champion->role == 'Luchador' ? 'selected' : '' }}>Luchador</option>
                        <option value="Tanque" {{ $champion->role == 'Tanque' ? 'selected' : '' }}>Tanque</option>
                        <option value="Asesino" {{ $champion->role == 'Asesino' ? 'selected' : '' }}>Asesino</option>
                        <option value="Soporte" {{ $champion->role == 'Soporte' ? 'selected' : '' }}>Soporte</option>
                        <option value="Tirador" {{ $champion->role == 'Tirador' ? 'selected' : '' }}>Tirador</option>

                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-bold">Región</label>

                    <input type="text"
                           name="region"
                           value="{{ $champion->region }}"
                           class="w-full bg-black border border-yellow-700 rounded-xl p-4">
                </div>

                <div>
                    <label class="block mb-2 font-bold">Tipo de daño</label>

                    <select name="damage_type"
                            class="w-full bg-black border border-yellow-700 rounded-xl p-4">

                        <option value="Físico" {{ $champion->damage_type == 'Físico' ? 'selected' : '' }}>Físico</option>
                        <option value="Mágico" {{ $champion->damage_type == 'Mágico' ? 'selected' : '' }}>Mágico</option>
                        <option value="Mixto" {{ $champion->damage_type == 'Mixto' ? 'selected' : '' }}>Mixto</option>

                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-bold">Recurso</label>

                    <select name="resource"
                            class="w-full bg-black border border-yellow-700 rounded-xl p-4">

                        <option value="Mana" {{ $champion->resource == 'Mana' ? 'selected' : '' }}>Mana</option>
                        <option value="Energía" {{ $champion->resource == 'Energía' ? 'selected' : '' }}>Energía</option>
                        <option value="Furia" {{ $champion->resource == 'Furia' ? 'selected' : '' }}>Furia</option>
                        <option value="Flujo" {{ $champion->resource == 'Flujo' ? 'selected' : '' }}>Flujo</option>
                        <option value="Ninguno" {{ $champion->resource == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>

                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-bold">Año lanzamiento</label>

                    <input type="number"
                           name="release_year"
                           value="{{ $champion->release_year }}"
                           class="w-full bg-black border border-yellow-700 rounded-xl p-4">
                </div>

            </div>

            <div class="mt-6">

                <label class="block mb-2 font-bold">
                    Descripción
                </label>

                <textarea name="description"
                          rows="5"
                          class="w-full bg-black border border-yellow-700 rounded-xl p-4">{{ $champion->description }}</textarea>

            </div>

            <div class="mt-6">

                <label class="block mb-2 font-bold">
                    Imagen principal
                </label>

                <input type="text"
                       name="image"
                       value="{{ $champion->image }}"
                       class="w-full bg-black border border-yellow-700 rounded-xl p-4">

            </div>

        </div>

        <!-- HABILIDADES -->
        <div class="bg-[#111111] border border-blue-700 rounded-2xl p-8">

            <h2 class="text-3xl font-black text-blue-400 mb-8">
                Habilidades
            </h2>

            @foreach($champion->abilities as $index => $ability)

                <div class="border border-gray-700 rounded-2xl p-6 mb-6">

                    <h3 class="text-2xl font-bold mb-6">
                        Habilidad {{ $index + 1 }}
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <input type="text"
                               name="abilities[{{ $index }}][name]"
                               value="{{ $ability->name }}"
                               class="bg-black border border-gray-700 rounded-xl p-4">

                        <input type="text"
                               name="abilities[{{ $index }}][image]"
                               value="{{ $ability->image }}"
                               class="bg-black border border-gray-700 rounded-xl p-4">

                        <input type="text"
                               name="abilities[{{ $index }}][video]"
                               value="{{ $ability->video_url }}"
                               class="bg-black border border-gray-700 rounded-xl p-4 md:col-span-2">

                        <textarea
                            name="abilities[{{ $index }}][description]"
                            rows="3"
                            class="bg-black border border-gray-700 rounded-xl p-4 md:col-span-2">{{ $ability->description }}</textarea>

                    </div>

                </div>

            @endforeach

        </div>

        <!-- ASPECTOS -->
        <div class="bg-[#111111] border border-red-700 rounded-2xl p-8">

            <h2 class="text-3xl font-black text-red-400 mb-8">
                Aspectos
            </h2>

            <div id="skins-container">

                @foreach($champion->skins as $index => $skin)

                    <div class="border border-gray-700 rounded-2xl p-6 mb-6 skin-block">

                        <div class="flex justify-between items-center mb-6">

                            <h3 class="text-2xl font-bold">
                                Aspecto {{ $index + 1 }}
                            </h3>

                            <button type="button"
                                    class="delete-skin-btn bg-red-600 hover:bg-red-700 px-4 py-2 rounded-xl text-white font-bold">

                                🗑️

                            </button>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <input type="text"
                                   name="skins[{{ $index }}][name]"
                                   value="{{ $skin->name }}"
                                   class="bg-black border border-gray-700 rounded-xl p-4">

                            <input type="number"
                                   name="skins[{{ $index }}][price]"
                                   value="{{ $skin->price }}"
                                   class="bg-black border border-gray-700 rounded-xl p-4">

                            <input type="text"
                                   name="skins[{{ $index }}][image]"
                                   value="{{ $skin->image }}"
                                   class="bg-black border border-gray-700 rounded-xl p-4 md:col-span-2">

                        </div>

                    </div>

                @endforeach

            </div>

            <button type="button"
                    id="add-skin-btn"
                    class="mt-4 bg-red-500 hover:bg-red-600 px-6 py-3 rounded-xl font-bold">

                Añadir Aspecto

            </button>

        </div>

        <button class="bg-yellow-500 hover:bg-yellow-600 text-black px-8 py-4 rounded-xl font-black text-xl">
            Guardar Cambios
        </button>

    </form>

</div>

<script>

    let skinIndex = {{ count($champion->skins) }};

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

            <div class="flex justify-between items-center mb-6">

                <h3 class="text-2xl font-bold">
                    Aspecto ${skinIndex + 1}
                </h3>

                <button type="button"
                        class="delete-skin-btn bg-red-600 hover:bg-red-700 px-4 py-2 rounded-xl text-white font-bold">

                    🗑️

                </button>

            </div>

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

    let skinToDelete = null;

    function openDeleteSkinModal(button)
    {
        skinToDelete = button.closest('.skin-block');

        document
            .getElementById('deleteSkinModal')
            .classList.remove('hidden');

        document
            .getElementById('deleteSkinModal')
            .classList.add('flex');
    }

    function closeDeleteSkinModal()
    {
        document
            .getElementById('deleteSkinModal')
            .classList.add('hidden');

        document
            .getElementById('deleteSkinModal')
            .classList.remove('flex');

        skinToDelete = null;
    }

    function confirmDeleteSkin()
    {
        if (skinToDelete)
        {
            skinToDelete.remove();
        }

        closeDeleteSkinModal();
    }

    document.addEventListener('click', function(e)
    {
        if (e.target.classList.contains('delete-skin-btn'))
        {
            openDeleteSkinModal(e.target);
        }
    });

</script>

<div id="deleteSkinModal"
     class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

    <div class="bg-[#111111] border border-red-500 rounded-2xl p-8 w-full max-w-md">

        <h2 class="text-3xl font-black text-red-500 mb-4">
            Confirmar eliminación
        </h2>

        <p class="text-gray-300 mb-6">
            ¿Eliminar este aspecto?
        </p>

        <div class="flex justify-end gap-4">

            <button
                type="button"
                onclick="closeDeleteSkinModal()"
                class="bg-gray-700 hover:bg-gray-600 px-5 py-2 rounded-xl font-bold">

                Cancelar

            </button>

            <button
                type="button"
                onclick="confirmDeleteSkin()"
                class="bg-red-500 hover:bg-red-600 px-5 py-2 rounded-xl font-bold">

                Eliminar

            </button>

        </div>

    </div>

</div>

</body>
</html>

