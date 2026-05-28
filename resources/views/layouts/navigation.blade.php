<nav x-data="{ open: false }" class="bg-black border-b border-yellow-600">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex justify-between h-20 items-center">

            <!-- LOGO -->
            <div class="flex items-center gap-4">

                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3">

                    <img src="{{ asset('images/logo.png') }}"
                         class="w-10 h-10 rounded-full object-cover">

                    <span class="text-yellow-400 font-black text-2xl">
                        Road To The Nexo
                    </span>

                </a>

            </div>

            <!-- DERECHA -->
            <div class="hidden sm:flex sm:items-center sm:gap-4">

                @auth

                    <x-dropdown align="right" width="48">

                        <x-slot name="trigger">

                            <button
                                class="inline-flex items-center px-4 py-2 bg-zinc-900 border border-yellow-500 rounded-xl text-sm font-bold text-yellow-400 hover:bg-yellow-500 hover:text-black transition">

                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-2">

                                    <svg class="fill-current h-4 w-4"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">

                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>

                                    </svg>

                                </div>

                            </button>

                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link :href="route('profile.edit')">
                                Perfil
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                 this.closest('form').submit();">

                                    Cerrar sesión

                                </x-dropdown-link>

                            </form>

                        </x-slot>

                    </x-dropdown>

                @else

                    <a href="{{ route('login') }}"
                       class="px-5 py-2 rounded-xl border border-yellow-500 text-yellow-400 font-bold hover:bg-yellow-500 hover:text-black transition">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="px-5 py-2 rounded-xl bg-red-600 text-white font-bold hover:bg-red-700 transition">

                        Registro

                    </a>

                @endauth

            </div>

        </div>

    </div>

</nav>
