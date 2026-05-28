@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white">

        {{-- HEADER --}}
        <header class="border-b border-yellow-600 bg-[#050505]">

            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="{{ route('forums.index') }}"
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
        <section class="max-w-6xl mx-auto px-6 py-16">

            <h1 class="text-5xl font-black text-yellow-400 mb-12">
                {{ $thread->title }}
            </h1>

            {{-- MENSAJES --}}
            <div class="space-y-6 mb-16">

                @foreach($thread->messages as $message)

                    <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-6">

                        <div class="flex justify-between items-center mb-4">

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-full bg-yellow-500 text-black flex items-center justify-center font-black text-xl">

                                    {{ strtoupper(substr($message->user->name, 0, 1)) }}

                                </div>

                                <div>

                                    <p class="font-black text-cyan-400 text-lg">
                                        {{ $message->user->name }}
                                    </p>

                                    <p class="text-gray-500 text-sm">
                                        {{ $message->created_at->format('d/m/Y H:i') }}
                                    </p>

                                </div>

                            </div>

                        </div>

                        <p class="text-gray-300 text-lg leading-relaxed">
                            {{ $message->message }}
                        </p>

                    </div>

                @endforeach

            </div>

            {{-- RESPONDER --}}
            <form action="{{ route('forums.message', $thread) }}"
                  method="POST"
                  class="bg-[#111111] border border-yellow-700 rounded-3xl p-8">

                @csrf

                <h2 class="text-3xl font-black text-yellow-400 mb-6">
                    Responder
                </h2>

                <textarea name="message"
                          rows="6"
                          required
                          class="w-full bg-black border border-gray-700 rounded-xl px-6 py-4 text-white resize-none focus:outline-none focus:border-yellow-500 mb-6"></textarea>

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 px-8 py-4 rounded-xl font-bold text-lg transition">

                    Enviar Mensaje

                </button>

            </form>

        </section>

    </div>

@endsection
