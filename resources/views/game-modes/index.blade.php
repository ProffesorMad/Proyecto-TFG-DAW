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

                        <a href="{{ route('game-modes.create') }}"
                           class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-bold transition">

                            Añadir Modo de Juego

                        </a>

                    @endif

                @endauth

            </div>

        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-5">
                Modos de Juego
            </h1>

            <p class="text-gray-400 text-xl mb-14">
                Descubre todas las experiencias jugables disponibles dentro de League of Legends.
            </p>

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                @foreach($gameModes as $mode)

                    {{-- CARD --}}
                    <div class="bg-[#111111] border border-yellow-700 rounded-2xl overflow-hidden hover:scale-[1.02] transition duration-300 shadow-xl">

                        {{-- IMAGEN --}}
                        <div class="h-[340px] overflow-hidden bg-black border-b border-yellow-900">

                            <img src="{{ $mode->image }}"
                                 class="w-full h-full object-cover">

                        </div>

                        {{-- INFO --}}
                        <div class="p-8">

                            <h2 class="text-5xl font-black text-yellow-400 mb-5 leading-none">
                                {{ $mode->name }}
                            </h2>

                            <p class="text-gray-300 text-lg leading-relaxed mb-8">
                                {{ $mode->description }}
                            </p>

                            {{-- STATS --}}
                            <div class="grid grid-cols-2 gap-8 mt-8">

                                <div class="bg-[#0a0a0a] border border-gray-700 rounded-xl p-4">

                                    <p class="text-gray-400 text-sm mb-2">
                                        Disponibilidad
                                    </p>

                                    <p class="text-cyan-400 font-bold text-lg">
                                        {{ $mode->availability }}
                                    </p>

                                </div>

                                <div class="bg-[#0a0a0a] border border-gray-700 rounded-xl p-4">

                                    <p class="text-gray-400 text-sm mb-2">
                                        Máx. jugadores
                                    </p>

                                    <p class="text-orange-400 font-bold text-lg">
                                        {{ $mode->max_players }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    </div>

@endsection
