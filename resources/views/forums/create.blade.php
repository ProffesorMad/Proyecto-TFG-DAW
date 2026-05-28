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

            </div>

        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-4xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-5">
                Crear Nuevo Chat
            </h1>

            <p class="text-gray-400 text-xl mb-14">
                Inicia una conversación con la comunidad.
            </p>

            <form action="{{ route('forums.store') }}"
                  method="POST"
                  class="bg-[#111111] border border-yellow-700 rounded-3xl p-10 space-y-8">

                @csrf

                <div>

                    <label class="block text-yellow-400 font-bold mb-3 text-xl">
                        Asunto del Chat
                    </label>

                    <input type="text"
                           name="title"
                           required
                           class="w-full bg-black border border-gray-700 rounded-xl px-6 py-4 text-white focus:outline-none focus:border-yellow-500">

                </div>

                <div>

                    <label class="block text-yellow-400 font-bold mb-3 text-xl">
                        Primer Mensaje
                    </label>

                    <textarea name="message"
                              rows="8"
                              required
                              class="w-full bg-black border border-gray-700 rounded-xl px-6 py-4 text-white resize-none focus:outline-none focus:border-yellow-500"></textarea>

                </div>

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 px-10 py-4 rounded-xl font-bold text-xl transition">

                    Crear Chat

                </button>

            </form>

        </section>

    </div>

@endsection
