@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white">

        {{-- HEADER --}}
        <header class="border-b border-yellow-600 bg-[#050505]">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="/" class="flex items-center gap-4">

                    <img src="{{ asset('images/logo.png') }}"
                         class="w-14 h-14 rounded-full">

                    <h1 class="text-4xl font-black text-yellow-400">
                        Road To The Nexo
                    </h1>

                </a>


            </div>
        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-7xl mx-auto px-6 pt-20 pb-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-5">
                Roles
            </h1>

            <p class="text-gray-400 text-xl mb-14">
                Descubre los distintos estilos de juego y cómo cada tipo de campeón influye en las partidas.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

                @foreach($roles as $role)

                    <a href="{{ route('roles.show', $role['name']) }}"
                       class="bg-[#111111] border border-yellow-700 rounded-2xl overflow-hidden hover:scale-[1.02] transition duration-300 shadow-xl">

                        {{-- IMAGEN --}}
                        <div class="bg-[#0a0a0a] flex items-center justify-center h-40 border-b border-yellow-900">

                            <img src="{{ $role['image'] }}"
                                 class="w-24 h-24 object-contain opacity-90 rounded-xl shadow-[0_0_25px_rgba(250,204,21,0.15)]">

                        </div>

                        {{-- INFO --}}
                        <div class="p-8 flex flex-col gap-6 min-h-[300px]">

                            <h2 class="text-4xl font-black text-yellow-400 leading-none">
                                {{ $role['name'] }}
                            </h2>

                            <p class="text-gray-300 leading-relaxed text-[17px] mt-1">
                                {{ $role['description'] }}
                            </p>

                        </div>

                    </a>

                @endforeach

            </div>

        </section>

    </div>

@endsection
