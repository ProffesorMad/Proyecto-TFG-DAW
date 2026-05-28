@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white">

        {{-- HEADER --}}
        <header class="border-b border-yellow-600 bg-[#050505]">

            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="/"
                   class="flex items-center gap-4">

                    <img src="{{ asset('images/logo.png') }}"
                         class="w-14 h-14 rounded-full object-cover">

                    <h1 class="text-4xl font-black text-yellow-400">
                        Road To The Nexo
                    </h1>

                </a>

                @auth

                    @if(auth()->user()->email === 'Admin@gmail.com')

                        <a href="{{ route('spells.create') }}"
                           class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-bold transition">

                            Crear Hechizo

                        </a>

                    @endif

                @endauth

            </div>

        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-5">
                Hechizos
            </h1>

            <p class="text-gray-400 text-xl mb-14">
                Explora todos los hechizos de invocador disponibles.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">

                @foreach($spells as $spell)

                    <div onclick="openSpellModal('{{ $spell->video_url }}')"
                         class="bg-[#0d0d0d] border border-yellow-700 rounded-2xl overflow-hidden shadow-xl hover:scale-[1.02] transition cursor-pointer">

                        {{-- IMAGEN --}}
                        <div class="h-40 bg-black flex items-center justify-center border-b border-yellow-900 p-4">

                            <img src="{{ $spell->image }}"
                                 class="w-24 h-24 object-cover rounded-xl">

                        </div>

                        {{-- INFO --}}
                        <div class="p-6 flex flex-col justify-between">

                            <h2 class="text-3xl font-black text-yellow-400 mb-3 leading-tight">
                                {{ $spell->name }}
                            </h2>

                            <p class="text-gray-300 text-base leading-relaxed mb-5">
                                {{ $spell->description }}
                            </p>

                            <div class="space-y-3 mb-8">

                                <p>
                                    <span class="text-cyan-400 font-bold">
                                        Modos:
                                    </span>

                                    {{ $spell->game_modes }}
                                </p>

                                <p>
                                    <span class="text-orange-400 font-bold">
                                        Enfriamiento:
                                    </span>

                                    {{ $spell->cooldown }}
                                </p>

                            </div>

                            {{-- BOTONES SOLO ADMIN --}}
                            @auth

                                @if(auth()->user()->email === 'Admin@gmail.com')

                                    <div class="flex gap-3">

                                        <a href="{{ route('spells.edit', $spell) }}"
                                           onclick="event.stopPropagation()"
                                           class="bg-yellow-500 hover:bg-yellow-600 text-black px-5 py-3 rounded-xl font-bold transition">

                                            Editar

                                        </a>

                                        <form action="{{ route('spells.destroy', $spell) }}"
                                              method="POST"
                                              class="delete-form">

                                            @csrf
                                            @method('DELETE')

                                            <button type="button"
                                                    onclick="event.stopPropagation(); openDeleteModal(this)"
                                                    class="bg-red-500 hover:bg-red-600 px-5 py-3 rounded-xl font-bold transition">

                                                Eliminar

                                            </button>

                                        </form>

                                    </div>

                                @endif

                            @endauth

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    </div>

    {{-- MODAL ELIMINAR --}}
    <div id="deleteModal"
         class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

        <div class="bg-[#111111] border border-red-500 rounded-2xl p-8 w-full max-w-lg">

            <h2 class="text-3xl font-black text-red-500 mb-5">
                Confirmar eliminación
            </h2>

            <p class="text-gray-300 mb-6">
                ¿Estás seguro de querer eliminar este hechizo?
                <br><br>

                Escribe
                <span class="text-red-400 font-bold">
                    CONFIRMAR
                </span>

                para continuar.
            </p>

            <input type="text"
                   id="confirmInput"
                   class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white mb-6">

            <div class="flex gap-4">

                <button id="confirmDeleteBtn"
                        disabled
                        class="bg-red-500 opacity-50 px-6 py-3 rounded-xl font-bold">

                    Eliminar

                </button>

                <button onclick="closeDeleteModal()"
                        class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl font-bold">

                    Cancelar

                </button>

            </div>

        </div>

    </div>

    {{-- MODAL VIDEO --}}
    <div id="spellModal"
         class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50 p-10">

        <div class="relative w-full max-w-5xl">

            <button onclick="closeSpellModal()"
                    class="absolute -top-14 right-0 text-white text-5xl font-black hover:text-red-500 transition">

                ×

            </button>

            <video id="spellVideo"
                   class="w-full rounded-2xl border border-yellow-600 shadow-2xl"
                   controls
                   autoplay>

                <source src="" type="video/mp4">

            </video>

        </div>

    </div>

    <script>

        let currentForm = null;

        function openDeleteModal(button)
        {
            currentForm = button.closest('form');

            document.getElementById('deleteModal')
                .classList.remove('hidden');

            document.getElementById('deleteModal')
                .classList.add('flex');

            document.getElementById('confirmInput').value = '';

            document.getElementById('confirmDeleteBtn').disabled = true;

            document.getElementById('confirmDeleteBtn')
                .classList.add('opacity-50');
        }

        function closeDeleteModal()
        {
            document.getElementById('deleteModal')
                .classList.add('hidden');

            document.getElementById('deleteModal')
                .classList.remove('flex');
        }

        document.getElementById('confirmInput')
            .addEventListener('input', function()
            {
                const button =
                    document.getElementById('confirmDeleteBtn');

                if (this.value === 'CONFIRMAR')
                {
                    button.disabled = false;

                    button.classList.remove('opacity-50');
                }
                else
                {
                    button.disabled = true;

                    button.classList.add('opacity-50');
                }
            });

        document.getElementById('confirmDeleteBtn')
            .addEventListener('click', function()
            {
                if (currentForm)
                {
                    currentForm.submit();
                }
            });

        function openSpellModal(videoUrl)
        {
            if(!videoUrl) return;

            const modal =
                document.getElementById('spellModal');

            const video =
                document.getElementById('spellVideo');

            video.src = videoUrl;

            modal.classList.remove('hidden');

            modal.classList.add('flex');

            video.load();

            video.play();
        }

        function closeSpellModal()
        {
            const modal =
                document.getElementById('spellModal');

            const video =
                document.getElementById('spellVideo');

            video.pause();

            video.src = '';

            modal.classList.add('hidden');

            modal.classList.remove('flex');
        }

        document.getElementById('spellModal')
            .addEventListener('click', function(e)
            {
                if(e.target === this)
                {
                    closeSpellModal();
                }
            });

    </script>

@endsection
