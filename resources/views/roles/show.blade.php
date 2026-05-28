@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white">

        <header class="border-b border-yellow-600 bg-[#050505]">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="/" class="flex items-center gap-4">

                    <img src="{{ asset('images/logo.png') }}"
                         class="w-14 h-14 rounded-full">

                    <h1 class="text-4xl font-black text-yellow-400">
                        Road To The Nexo
                    </h1>

                </a>

                <a href="{{ route('roles.index') }}"
                   class="bg-gray-700 hover:bg-gray-600 px-5 py-3 rounded-xl font-bold">
                    Volver
                </a>

            </div>
        </header>

        <section class="max-w-7xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-14">
                {{ $role }}
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

                @foreach($champions as $champion)

                    <a href="{{ route('champions.show', $champion) }}"
                       class="bg-[#111111] border border-yellow-700 rounded-2xl overflow-hidden hover:scale-[1.02] transition duration-300">

                        <img src="{{ $champion->image }}"
                             class="w-full h-64 object-cover">

                        <div class="p-5">

                            <h2 class="text-3xl font-black text-yellow-400">
                                {{ $champion->name }}
                            </h2>

                        </div>

                    </a>

                @endforeach

            </div>

        </section>

    </div>

@endsection
