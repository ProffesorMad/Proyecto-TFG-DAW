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

                <div class="flex gap-4">

                    <a href="{{ route('forums.my') }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-3 rounded-xl font-bold transition">

                        Mis Foros

                    </a>

                    <a href="{{ route('forums.create') }}"
                       class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-bold transition">

                        Iniciar Chat

                    </a>

                </div>

            </div>

        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-5">
                Foro
            </h1>

            <p class="text-gray-400 text-xl mb-14">
                Participa en conversaciones con otros usuarios.
            </p>

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

        </section>

    </div>

@endsection
