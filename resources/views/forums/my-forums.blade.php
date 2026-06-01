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

                <a href="{{ route('forums.index') }}"
                   class="bg-gray-700 hover:bg-gray-600 px-5 py-3 rounded-xl font-bold">
                    Volver
                </a>

            </div>

        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-5">
                Mis Foros
            </h1>

            <p class="text-gray-400 text-xl mb-14">
                Chats y conversaciones donde has participado.
            </p>

            @if($threads->count() > 0)

                <div class="space-y-6">

                    @foreach($threads as $thread)

                        <a href="{{ route('forums.show', $thread) }}"
                           class="block bg-[#111111] border border-yellow-700 rounded-2xl p-6 hover:scale-[1.01] transition">

                            <div class="flex justify-between items-center">

                                <div>

                                    <h2 class="text-3xl font-black text-yellow-400 mb-2">
                                        {{ $thread->title }}
                                    </h2>

                                    <p class="text-gray-400">
                                        Creado por

                                        <span class="text-cyan-400 font-bold">
                                        {{ $thread->user->name }}
                                    </span>
                                    </p>

                                </div>

                                <div class="text-right">

                                    <p class="text-white font-bold text-2xl">
                                        {{ $thread->messages->count() }}
                                    </p>

                                    <p class="text-gray-500">
                                        mensajes
                                    </p>

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <div class="bg-[#111111] border border-yellow-700 rounded-3xl p-12 text-center">

                    <h2 class="text-4xl font-black text-yellow-400 mb-6">
                        Aún no participas en ningún foro
                    </h2>

                    <p class="text-gray-400 text-xl mb-10">
                        Participa en conversaciones o crea tu primer chat.
                    </p>

                    <a href="{{ route('forums.index') }}"
                       class="bg-blue-500 hover:bg-blue-600 px-8 py-4 rounded-xl font-bold text-xl transition">

                        Ir al Foro

                    </a>

                </div>

            @endif

        </section>

    </div>

@endsection
