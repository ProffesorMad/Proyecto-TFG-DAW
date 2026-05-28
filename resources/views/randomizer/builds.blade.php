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

                <a href="{{ route('randomizer.index') }}"
                   class="bg-gray-700 hover:bg-gray-600 px-5 py-3 rounded-xl font-bold">
                    Volver
                </a>

            </div>

        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-14">
                Mis Builds
            </h1>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

                @foreach($builds as $build)

                    <div class="bg-[#111111] border border-yellow-700 rounded-2xl overflow-hidden shadow-xl">

                        {{-- IMAGEN --}}
                        <div class="h-52 overflow-hidden border-b border-yellow-900">

                            <img src="{{ $build->champion->image }}"
                                 class="w-full h-full object-cover">

                        </div>

                        {{-- INFO --}}
                        <div class="p-6">

                            <div class="flex justify-between items-start mb-6">

                                <div>

                                    <h2 class="text-4xl font-black text-yellow-400 mb-2">
                                        {{ $build->champion->name }}
                                    </h2>

                                    <p class="text-cyan-400 font-bold text-xl">
                                        {{ $build->lane }}
                                    </p>

                                </div>

                                <p class="text-gray-500 text-sm">
                                    {{ $build->created_at->format('d/m/Y H:i') }}
                                </p>

                            </div>

                            {{-- OBJETOS --}}
                            <h3 class="text-2xl font-black text-yellow-400 mb-4">
                                Objetos
                            </h3>

                            <div class="grid grid-cols-3 gap-3 mb-8">

                                @foreach($build->items as $itemId)

                                    @php
                                        $item = \App\Models\Item::find($itemId);
                                    @endphp

                                    @if($item)

                                        <div class="bg-[#0a0a0a] border border-gray-700 rounded-xl p-3 text-center">

                                            <img src="{{ $item->image }}"
                                                 class="w-14 h-14 object-contain mx-auto mb-2">

                                            <p class="text-xs font-bold text-gray-200 leading-tight">
                                                {{ $item->name }}
                                            </p>

                                        </div>

                                    @endif

                                @endforeach

                            </div>

                            {{-- HECHIZOS --}}
                            <h3 class="text-2xl font-black text-yellow-400 mb-4">
                                Hechizos
                            </h3>

                            <div class="grid grid-cols-2 gap-4">

                                @foreach($build->spells as $spellId)

                                    @php
                                        $spell = \App\Models\Spell::find($spellId);
                                    @endphp

                                    @if($spell)

                                        <div class="bg-[#0a0a0a] border border-gray-700 rounded-xl p-4 text-center">

                                            <img src="{{ $spell->image }}"
                                                 class="w-16 h-16 object-contain mx-auto mb-3">

                                            <p class="font-bold text-gray-200">
                                                {{ $spell->name }}
                                            </p>

                                        </div>

                                    @endif

                                @endforeach

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    </div>

@endsection
