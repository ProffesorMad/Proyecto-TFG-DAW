@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white">

        {{-- HEADER --}}
        <header class="border-b border-yellow-600 bg-[#050505]">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="/" class="flex items-center gap-4">

                    <img src="{{ asset('images/logo.png') }}"
                         class="w-14 h-14 rounded-full">

                    <h1 class="text-4xl font-black text-yellow-400">
                        Road To The Nexo
                    </h1>

                </a>

                <a href="{{ route('items.create') }}"
                   class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-bold transition">
                    Crear Objeto
                </a>

            </div>
        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            <div class="flex items-center gap-4 mb-12">

                <button id="btnNormal"
                        class="filter-btn bg-yellow-500 text-black px-5 py-2 rounded-lg font-bold">
                    Normal
                </button>

                <button id="btnBoots"
                        class="filter-btn bg-gray-800 border border-gray-700 px-5 py-2 rounded-lg font-bold">
                    Botas
                </button>

            </div>

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

                @foreach($items as $item)

                    <div class="item-card bg-[#111111] border border-yellow-700 rounded-2xl overflow-hidden shadow-xl hover:scale-[1.02] transition duration-300"
                         data-type="{{ $item->type }}">

                        {{-- IMAGEN --}}
                        <div class="bg-[#0a0a0a] flex items-center justify-center h-40 p-4 border-b border-yellow-900">

                            <img src="{{ $item->image }}"
                                 class="w-28 h-28 object-contain hover:scale-110 transition duration-300 drop-shadow-2xl">

                        </div>

                        {{-- INFO --}}
                        <div class="p-4">

                            <h2 class="text-3xl font-black text-yellow-400 mb-4 leading-tight">
                                {{ $item->name }}
                            </h2>

                            <div class="space-y-2 text-gray-300">

                                <p>
                                    <span class="text-blue-400 font-bold">Tipo:</span>
                                    {{ $item->type }}
                                </p>

                                <p>
                                    <span class="text-yellow-400 font-bold">Coste:</span>
                                    {{ $item->cost }} oro
                                </p>

                                <p>
                                    <span class="text-green-400 font-bold">Estadísticas:</span>
                                    {{ $item->stats }}
                                </p>

                                <p>
                                    <span class="text-red-400 font-bold">Efecto:</span>
                                    {{ $item->effect }}
                                </p>

                            </div>

                            {{-- BOTONES --}}
                            <div class="flex gap-3 mt-6">

                                <a href="{{ route('items.edit', $item) }}"
                                   class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold px-4 py-2 rounded-lg transition">
                                    Editar
                                </a>

                                <button
                                    onclick="openDeleteModal({{ $item->id }})"
                                    class="bg-red-500 hover:bg-red-600 font-bold px-4 py-2 rounded-lg transition">
                                    Eliminar
                                </button>

                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

        </section>

    </div>

    {{-- MODAL ELIMINAR --}}
    <div id="deleteModal"
         class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

        <div class="bg-[#111111] border border-red-500 rounded-2xl p-10 w-full max-w-lg">

            <h2 class="text-3xl font-black text-red-500 mb-6">
                Confirmar eliminación
            </h2>

            <p class="text-gray-300 mb-6">
                ¿Seguro que quieres eliminar este objeto?
            </p>

            <p class="text-gray-400 mb-4">
                Escribe <span class="text-red-500 font-bold">CONFIRMAR</span>
            </p>

            <input type="text"
                   id="confirmInput"
                   class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white mb-8">

            <div class="flex gap-4">

                <button id="confirmDeleteButton"
                        onclick="confirmDelete()"
                        disabled
                        class="bg-red-500 opacity-50 cursor-not-allowed px-6 py-3 rounded-xl font-bold transition">
                    Eliminar
                </button>

                <button onclick="closeDeleteModal()"
                        class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl font-bold">
                    Cancelar
                </button>

            </div>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
            </form>

        </div>

    </div>

    <script>

        let currentDeleteId = null;

        function openDeleteModal(id)
        {
            currentDeleteId = id;

            document.getElementById('deleteModal')
                .classList.remove('hidden');

            document.getElementById('deleteModal')
                .classList.add('flex');

            document.getElementById('confirmInput').value = '';

            document.getElementById('confirmDeleteButton').disabled = true;

            document.getElementById('confirmDeleteButton')
                .classList.add('opacity-50', 'cursor-not-allowed');
        }

        function closeDeleteModal()
        {
            document.getElementById('deleteModal')
                .classList.add('hidden');

            document.getElementById('deleteModal')
                .classList.remove('flex');
        }

        const confirmInput =
            document.getElementById('confirmInput');

        const confirmButton =
            document.getElementById('confirmDeleteButton');

        confirmInput.addEventListener('input', () =>
        {
            if (confirmInput.value === 'CONFIRMAR')
            {
                confirmButton.disabled = false;

                confirmButton.classList.remove(
                    'opacity-50',
                    'cursor-not-allowed'
                );

                confirmButton.classList.add(
                    'hover:bg-red-600'
                );
            }
            else
            {
                confirmButton.disabled = true;

                confirmButton.classList.add(
                    'opacity-50',
                    'cursor-not-allowed'
                );

                confirmButton.classList.remove(
                    'hover:bg-red-600'
                );
            }
        });

        function confirmDelete()
        {
            const form =
                document.getElementById('deleteForm');

            form.action = `/items/${currentDeleteId}`;

            form.submit();
        }

        {{-- FILTROS --}}
        const btnNormal = document.getElementById('btnNormal');
        const btnBoots = document.getElementById('btnBoots');

        btnNormal.addEventListener('click', () => {

            document.querySelectorAll('.item-card')
                .forEach(card => {

                    card.style.display =
                        card.dataset.type === 'Normal'
                            ? 'block'
                            : 'none';
                });

        });

        btnBoots.addEventListener('click', () => {

            document.querySelectorAll('.item-card')
                .forEach(card => {

                    card.style.display =
                        card.dataset.type === 'Bota'
                            ? 'block'
                            : 'none';
                });

        });

    </script>

@endsection
