@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white flex items-center justify-center px-6 py-16">

        <div class="w-full max-w-2xl bg-[#111111] border border-yellow-700 rounded-3xl p-12 shadow-2xl">

            <div class="text-center mb-12">

                <img src="{{ asset('images/logo.png') }}"
                     class="w-24 h-24 rounded-full mx-auto mb-6 object-cover">

                <h1 class="text-5xl font-black text-yellow-400 mb-4">
                    Crear Cuenta
                </h1>

                <p class="text-gray-400 text-lg">
                    Únete a Road To The Nexo
                </p>

            </div>

            <form method="POST"
                  action="{{ route('register') }}"
                  class="space-y-8">

                @csrf

                {{-- NOMBRE --}}
                <div>

                    <label class="block text-yellow-400 font-bold mb-3">
                        Nombre de Usuario
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           class="w-full bg-black border border-gray-700 rounded-xl px-6 py-4 text-white focus:outline-none focus:border-yellow-500">

                    @error('name')

                    <p class="text-red-500 mt-2">
                        {{ $message }}
                    </p>

                    @enderror

                </div>

                {{-- EMAIL --}}
                <div>

                    <label class="block text-yellow-400 font-bold mb-3">
                        Correo Electrónico
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="w-full bg-black border border-gray-700 rounded-xl px-6 py-4 text-white focus:outline-none focus:border-yellow-500">

                    @error('email')

                    <p class="text-red-500 mt-2">
                        {{ $message }}
                    </p>

                    @enderror

                </div>

                {{-- PASSWORD --}}
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

                    <div class="mt-4 bg-black border border-gray-700 rounded-xl p-5">

                        <p class="text-yellow-400 font-bold mb-3">
                            Requisitos de la contraseña:
                        </p>

                        <ul class="text-gray-400 space-y-2 text-sm">

                            <li>• Mínimo 8 caracteres</li>

                            <li>• Una letra mayúscula</li>

                            <li>• Una letra minúscula</li>

                            <li>• Un número</li>

                            <li>• Un carácter especial (@$!%*#?&)</li>

                        </ul>

                    </div>

                </div>

                {{-- CONFIRMAR PASSWORD --}}
                <div>

                    <label class="block text-yellow-400 font-bold mb-3">
                        Confirmar Contraseña
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           required
                           class="w-full bg-black border border-gray-700 rounded-xl px-6 py-4 text-white focus:outline-none focus:border-yellow-500">

                </div>

                {{-- BOTON --}}
                <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 py-4 rounded-xl font-black text-xl transition">

                    Crear Cuenta

                </button>

            </form>

            {{-- LOGIN --}}
            <div class="mt-10 text-center">

                <p class="text-gray-400">

                    ¿Ya tienes cuenta?

                    <a href="{{ route('login') }}"
                       class="text-yellow-400 font-bold hover:text-yellow-300">

                        Inicia sesión aquí

                    </a>

                </p>

            </div>

        </div>

    </div>

@endsection
