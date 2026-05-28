@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white">

        {{-- HEADER --}}
        <header class="border-b border-yellow-600 bg-[#050505]">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="{{ route('items.index') }}"
                   class="flex items-center gap-4">

                    <img src="{{ asset('images/logo.png') }}"
                         class="w-14 h-14 rounded-full">

                    <h1 class="text-4xl font-black text-yellow-400">
                        Road To The Nexo
                    </h1>

                </a>

                <a href="{{ route('items.index') }}"
                   class="bg-gray-700 hover:bg-gray-600 px-5 py-3 rounded-xl font-bold">
                    Volver
                </a>

            </div>
        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-5xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-12">
                Editar Objeto
            </h1>

            <form action="{{ route('items.update', $item) }}"
                  method="POST"
                  class="space-y-10">

                @csrf
                @method('PUT')

                {{-- INFORMACIÓN --}}
                <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-8">

                    <h2 class="text-3xl font-black text-yellow-400 mb-8">
                        Información del Objeto
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <input type="text"
                               name="name"
                               value="{{ $item->name }}"
                               placeholder="Nombre"
                               class="bg-black border border-gray-700 rounded-xl px-5 py-4 text-white">

                        <select name="type"
                                class="bg-black border border-gray-700 rounded-xl px-5 py-4 text-white">

                            <option value="Normal"
                                {{ $item->type == 'Normal' ? 'selected' : '' }}>
                                Normal
                            </option>

                            <option value="Bota"
                                {{ $item->type == 'Bota' ? 'selected' : '' }}>
                                Bota
                            </option>

                        </select>

                        <input type="number"
                               name="cost"
                               value="{{ $item->cost }}"
                               placeholder="Coste"
                               class="bg-black border border-gray-700 rounded-xl px-5 py-4 text-white">

                        <input type="text"
                               name="image"
                               value="{{ $item->image }}"
                               placeholder="URL Imagen"
                               class="bg-black border border-gray-700 rounded-xl px-5 py-4 text-white md:col-span-2">

                        <textarea name="stats"
                                  rows="4"
                                  placeholder="Estadísticas"
                                  class="bg-black border border-gray-700 rounded-xl px-5 py-4 text-white md:col-span-2">{{ $item->stats }}</textarea>

                        <textarea name="effect"
                                  rows="4"
                                  placeholder="Efecto"
                                  class="bg-black border border-gray-700 rounded-xl px-5 py-4 text-white md:col-span-2">{{ $item->effect }}</textarea>

                        <textarea name="description"
                                  rows="4"
                                  placeholder="Descripción"
                                  class="bg-black border border-gray-700 rounded-xl px-5 py-4 text-white md:col-span-2">{{ $item->description }}</textarea>

                    </div>

                </div>

                {{-- BOTÓN --}}
                <div class="flex justify-end">

                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-400 text-black font-black px-8 py-4 rounded-xl transition">
                        Guardar Cambios
                    </button>

                </div>

            </form>

        </section>

    </div>

@endsection
