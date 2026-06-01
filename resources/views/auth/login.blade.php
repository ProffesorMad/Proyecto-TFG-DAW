@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white flex items-center justify-center px-6">

        <div class="w-full max-w-2xl bg-[#111111] border border-yellow-700 rounded-3xl p-12 shadow-2xl">

            <div class="text-center mb-12">

                <img src="{{ asset('images/logo.png') }}"
                     class="w-24 h-24 rounded-full mx-auto mb-6 object-cover">

                <h1 class="text-5xl font-black text-yellow-400 mb-4">
                    Iniciar Sesión
                </h1>

                <p class="text-gray-400 text-lg">
                    Accede a tu cuenta de Road To The Nexo
                </p>

            </div>

            @if(session('status'))

                <div class="bg-green-500 text-black p-4 rounded-xl mb-8 font-bold">

                    {{ session('status') }}

                </div>

            @endif

            <form method="POST"
                  action="{{ route('login') }}"
                  class="space-y-8">

                @csrf

                <div>

                    <label class="block text-yellow-400 font-bold mb-3">
                        Correo Electrónico
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           class="w-full bg-black border border-gray-700 rounded-xl px-6 py-4 text-white focus:outline-none focus:border-yellow-500">

                    @error('email')

                    <p class="text-red-500 mt-2">
                        {{ $message }}
                    </p>

                    @enderror

                </div>

                <div>

                    <label class="block text-yellow-400 font-bold mb-3">
                        Contraseña
                    </label>

                    <input type="password"
                           name="password"
                           required
                           class="w-full bg-black border border-gray-700 rounded-xl px-6 py-4 text-white focus:outline-none focus:border-yellow-500">

                    @error('password')

                    <p class="text-red-500 mt-2">
                        {{ $message }}
                    </p>

                    @enderror

                </div>

                <div class="flex items-center justify-between">

                    <label class="flex items-center gap-3 text-gray-300">

                        <input type="checkbox"
                               name="remember"
                               class="rounded border-gray-600 bg-black">

                        Recordarme

                    </label>

                </div>

                <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 py-4 rounded-xl font-black text-xl transition">

                    Iniciar Sesión

                </button>

            </form>

            <div class="mt-10 text-center">

                <p class="text-gray-400">

                    ¿No tienes cuenta?

                    <a href="{{ route('register') }}"
                       class="text-yellow-400 font-bold hover:text-yellow-300">

                        Regístrate aquí

                    </a>

                </p>

            </div>

        </div>

    </div>

@endsection
