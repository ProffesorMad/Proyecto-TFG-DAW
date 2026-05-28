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

                <a href="{{ route('randomizer.builds') }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-3 rounded-xl font-bold transition">

                    Mis Builds

                </a>

            </div>

        </header>

        {{-- CONTENT --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            @if(session('success'))

                <div class="mb-8 bg-green-500 text-white px-6 py-4 rounded-2xl font-bold shadow-xl">

                    {{ session('success') }}

                </div>

            @endif

            <h1 class="text-6xl font-black text-yellow-400 mb-5">
                Randomizador
            </h1>

            <p class="text-gray-400 text-xl mb-16">
                Genera builds completamente aleatorias para desafiarte en League of Legends.
            </p>

            @isset($champion)

                <div class="grid lg:grid-cols-2 gap-10 items-start">

                    {{-- IZQUIERDA --}}
                    <div class="space-y-5">

                        {{-- CHAMPION CARD --}}
                        <div class="bg-[#111111] border border-yellow-700 rounded-2xl overflow-hidden shadow-xl">

                            <div class="h-[320px] overflow-hidden border-b border-yellow-900">

                                <img src="{{ $champion->image }}"
                                     class="w-full h-full object-cover">

                            </div>

                            <div class="p-8">

                                <h2 class="text-5xl font-black text-yellow-400 mb-6">
                                    {{ $champion->name }}
                                </h2>

                                <div class="bg-[#0a0a0a] border border-gray-700 rounded-xl p-5">

                                    <p class="text-gray-400 mb-2">
                                        Posición aleatoria
                                    </p>

                                    <p class="text-3xl font-black text-cyan-400">
                                        {{ $lane }}
                                    </p>

                                </div>

                            </div>

                        </div>

                        {{-- BOTONES --}}
                        <div class="flex gap-5">

                            {{-- REGENERAR --}}
                            <form action="{{ route('randomizer.generate') }}"
                                  method="POST">

                                @csrf

                                <button
                                    class="bg-blue-500 hover:bg-blue-600 px-8 py-4 rounded-2xl text-xl font-black transition">

                                    Volver a Generar

                                </button>

                            </form>

                            {{-- GUARDAR --}}
                            <form action="{{ route('randomizer.save') }}"
                                  method="POST">

                                @csrf

                                <input type="hidden"
                                       name="champion_id"
                                       value="{{ $champion->id }}">

                                <input type="hidden"
                                       name="lane"
                                       value="{{ $lane }}">

                                <input type="hidden"
                                       name="items"
                                       value='@json($items->pluck("id"))'>

                                <input type="hidden"
                                       name="spells"
                                       value='@json(collect($spells)->pluck("id"))'>

                                <button class="bg-green-500 hover:bg-green-600 text-white px-10 py-4 rounded-2xl font-black text-2xl transition">

                                    Guardar Build

                                </button>

                            </form>

                        </div>

                    </div>

                    {{-- DERECHA --}}
                    <div class="space-y-8">

                        {{-- ITEMS --}}
                        <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-8">

                            <h2 class="text-4xl font-black text-yellow-400 mb-8">
                                Objetos
                            </h2>

                            <div class="grid grid-cols-3 gap-5">

                                @foreach($items as $item)

                                    @if($item)

                                        <div class="bg-[#0a0a0a] border border-gray-700 rounded-xl p-4 text-center">

                                            <img src="{{ $item->image }}"
                                                 class="w-20 h-20 object-contain mx-auto mb-4">

                                            <p class="font-bold text-sm text-gray-200">
                                                {{ $item->name }}
                                            </p>

                                        </div>

                                    @endif

                                @endforeach

                            </div>

                        </div>

                        {{-- SPELLS --}}
                        <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-8">

                            <h2 class="text-4xl font-black text-yellow-400 mb-8">
                                Hechizos
                            </h2>

                            <div class="grid grid-cols-2 gap-6">

                                @foreach($spells as $spell)

                                    @if($spell)

                                        <div class="bg-[#0a0a0a] border border-gray-700 rounded-xl p-5 text-center">

                                            <img src="{{ $spell->image }}"
                                                 class="w-24 h-24 object-contain mx-auto mb-5">

                                            <p class="text-xl font-black text-white">
                                                {{ $spell->name }}
                                            </p>

                                        </div>

                                    @endif

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            @else

                {{-- EMPTY --}}
                <div class="bg-[#111111] border border-yellow-700 rounded-3xl p-20 text-center">

                    <h2 class="text-5xl font-black text-yellow-400 mb-8">
                        Genera una build aleatoria
                    </h2>

                    <p class="text-gray-400 text-xl mb-10">
                        Pulsa el botón generar para crear una build completamente aleatoria.
                    </p>

                    <form action="{{ route('randomizer.generate') }}"
                          method="POST">

                        @csrf

                        <button
                            class="bg-blue-500 hover:bg-blue-600 px-12 py-5 rounded-2xl text-2xl font-black transition">

                            GENERAR BUILD

                        </button>

                    </form>

                </div>

            @endisset

        </section>

    </div>

@endsection
