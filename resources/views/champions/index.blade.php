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
           class="bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-lg font-bold transition">
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach($champions as $champion)

            <div class="bg-[#111111] border border-yellow-700 rounded-2xl overflow-hidden hover:scale-[1.02] transition duration-300">

                <a href="{{ route('champions.show', $champion) }}">

                    <img src="{{ $champion->image }}"
                         class="w-full h-64 object-cover">

                    <div class="p-6">

                        <h3 class="text-3xl font-black text-yellow-400 mb-3">
                            {{ $champion->name }}
                        </h3>

                        <p class="text-gray-300">
                            {{ $champion->description }}
                        </p>

                    </div>

                </a>

                <div class="px-6 pb-6 flex gap-3">

                    <a href="{{ route('champions.edit', $champion) }}"
                       class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg font-bold transition">
                        Editar
                    </a>

                    <button
                        onclick="openDeleteModal({{ $champion->id }}, '{{ $champion->name }}')"
                        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg font-bold transition">

                        Eliminar

                    </button>

                </div>

            </div>

        @endforeach

    </div>

</section>

<div id="deleteModal"
     class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

    <div class="bg-[#111111] border border-red-500 rounded-2xl p-8 w-full max-w-md">

        <h2 class="text-3xl font-black text-red-500 mb-4">
            Confirmar eliminación
        </h2>

        <p class="text-gray-300 mb-6">
            ¿Estás seguro de querer eliminar este campeón?
        </p>

        <p class="text-yellow-400 font-bold mb-4">
            Escribe CONFIRMAR para eliminarlo.
        </p>

        <input
            type="text"
            id="confirmInput"
            class="w-full bg-black border border-gray-700 rounded-xl p-4 mb-6 text-white">

        <form id="deleteForm" method="POST">

            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-4">

                <button
                    type="button"
                    onclick="closeDeleteModal()"
                    class="bg-gray-700 hover:bg-gray-600 px-5 py-2 rounded-xl font-bold">

                    Cancelar

                </button>

                <button
                    type="submit"
                    id="confirmDeleteBtn"
                    disabled
                    class="bg-red-500 opacity-50 cursor-not-allowed px-5 py-2 rounded-xl font-bold">

                    Eliminar

                </button>

            </div>

        </form>

    </div>

</div>

<script>

    const modal = document.getElementById('deleteModal');
    const input = document.getElementById('confirmInput');
    const deleteBtn = document.getElementById('confirmDeleteBtn');
    const deleteForm = document.getElementById('deleteForm');

    function openDeleteModal(id, name)
    {
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        input.value = '';

        deleteBtn.disabled = true;
        deleteBtn.classList.add('opacity-50', 'cursor-not-allowed');

        deleteForm.action = `/champions/${id}`;
    }

    function closeDeleteModal()
    {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    input.addEventListener('input', function ()
    {
        if (input.value === 'CONFIRMAR')
        {
            deleteBtn.disabled = false;
            deleteBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
        else
        {
            deleteBtn.disabled = true;
            deleteBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    });

</script>

</body>
</html>
