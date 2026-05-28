@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white">

        <header class="border-b border-yellow-600 bg-[#050505]">

            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="{{ route('spells.index') }}"
                   class="flex items-center gap-4">

                    <img src="{{ asset('images/logo.png') }}"
                         class="w-14 h-14 rounded-full object-cover">

                    <h1 class="text-4xl font-black text-yellow-400 tracking-tight">
                        Road To The Nexo
                    </h1>

                </a>

                <a href="{{ route('spells.index') }}"
                   class="text-yellow-400 font-bold hover:text-yellow-300 transition">
                    Volver
                </a>

            </div>

        </header>

        <section class="max-w-5xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-14">
                Crear Hechizo
            </h1>

            <form action="{{ route('spells.store') }}"
                  method="POST"
                  class="space-y-10">

                @csrf

                <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-8">

                    <h2 class="text-3xl font-black text-yellow-400 mb-8">
                        Información General
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-lg font-bold mb-3">
                                Nombre
                            </label>

                            <input type="text"
                                   name="name"
                                   class="w-full bg-black border border-gray-700 rounded-xl px-5 py-4 text-white focus:border-yellow-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-lg font-bold mb-3">
                                Enfriamiento
                            </label>

                            <input type="text"
                                   name="cooldown"
                                   placeholder="300 s"
                                   class="w-full bg-black border border-gray-700 rounded-xl px-5 py-4 text-white focus:border-yellow-500 focus:outline-none">
                        </div>

                    </div>

                    <div class="mt-6">

                        <label class="block text-lg font-bold mb-3">
                            Descripción
                        </label>

                        <textarea name="description"
                                  rows="4"
                                  class="w-full bg-black border border-gray-700 rounded-xl px-5 py-4 text-white focus:border-yellow-500 focus:outline-none"></textarea>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                        <div>
                            <label class="block text-lg font-bold mb-3">
                                Modos disponibles
                            </label>

                            <input type="text"
                                   name="game_modes"
                                   placeholder="Clásico, ARAM..."
                                   class="w-full bg-black border border-gray-700 rounded-xl px-5 py-4 text-white focus:border-yellow-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-lg font-bold mb-3">
                                URL Imagen
                            </label>

                            <input type="text"
                                   name="image"
                                   class="w-full bg-black border border-gray-700 rounded-xl px-5 py-4 text-white focus:border-yellow-500 focus:outline-none">
                        </div>

                    </div>

                    <div class="mt-6">

                        <label class="block text-lg font-bold mb-3">
                            URL Video
                        </label>

                        <input type="text"
                               name="video_url"
                               class="w-full bg-black border border-gray-700 rounded-xl px-5 py-4 text-white focus:border-yellow-500 focus:outline-none">

                    </div>

                </div>

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 px-8 py-4 rounded-xl font-bold text-xl transition">
                    Crear Hechizo
                </button>

            </form>

        </section>

    </div>

@endsection
