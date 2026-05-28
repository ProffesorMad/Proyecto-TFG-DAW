<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $champion->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black text-white min-h-screen">

<!-- HEADER -->
<header class="border-b border-yellow-600 bg-black/95 backdrop-blur">

    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

        <a href="/" class="flex items-center gap-4">

            <img src="/images/logo.png"
                 class="w-14 h-14 rounded-full border border-yellow-500">

            <h1 class="text-5xl font-black text-yellow-400">
                Road To The Nexo
            </h1>

        </a>

        <a href="{{ route('champions.index') }}"
           class="bg-gray-700 hover:bg-gray-600 px-5 py-3 rounded-xl font-bold">
            Volver
        </a>

    </div>

</header>

<!-- CONTENIDO -->
<div class="max-w-7xl mx-auto px-6 py-16">

    <!-- INFORMACIÓN -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <img
            src="{{ $champion->image }}"
            class="w-full h-[420px] object-cover rounded-3xl border border-yellow-600">

        <div>

            <h1 class="text-7xl font-black text-yellow-400 mb-6">
                {{ $champion->name }}
            </h1>

            <p class="text-3xl text-zinc-300 mb-10">
                {{ $champion->description }}
            </p>

            <div class="space-y-4 text-2xl">

                <p>
                    <span class="text-red-400 font-bold">Rol:</span>
                    {{ $champion->role }}
                </p>

                <p>
                    <span class="text-yellow-400 font-bold">Región:</span>
                    {{ $champion->region }}
                </p>

                <p>
                    <span class="text-blue-400 font-bold">Tipo de daño:</span>
                    {{ $champion->damage_type }}
                </p>

                <p>
                    <span class="text-purple-400 font-bold">Recurso:</span>
                    {{ $champion->resource }}
                </p>

                <p>
                    <span class="text-green-400 font-bold">Año lanzamiento:</span>
                    {{ $champion->release_year }}
                </p>

            </div>

        </div>

    </div>

    <!-- HABILIDADES -->
    <section class="mt-24">

        <h2 class="text-6xl font-black text-yellow-400 mb-12">
            Habilidades
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

            @foreach($champion->abilities->sortBy('order') as $ability)

                <div
                    onclick="openAbilityModal('{{ $ability->video_url }}')"
                    class="bg-zinc-900 border border-yellow-600 rounded-3xl overflow-hidden cursor-pointer hover:scale-105 transition duration-300">

                    <img
                        src="{{ $ability->image }}"
                        class="w-full h-44 object-cover">

                    <div class="p-5">

                        <h3 class="text-3xl font-black text-yellow-400 mb-3">
                            {{ $ability->name }}
                        </h3>

                        <p class="text-zinc-300 text-lg leading-relaxed">
                            {{ $ability->description }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

    <!-- ASPECTOS -->
    <section class="mt-28">

        <h2 class="text-6xl font-black text-pink-400 mb-12">
            Aspectos
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach($champion->skins as $skin)

                <div
                    onclick="openSkinModal('{{ $skin->image }}')"
                    class="bg-zinc-900 border border-pink-500 rounded-3xl overflow-hidden cursor-pointer hover:scale-105 transition duration-300">

                    <img
                        src="{{ $skin->image }}"
                        class="w-full h-72 object-cover">

                    <div class="p-5">

                        <h3 class="text-3xl font-black text-pink-400 mb-3">
                            {{ $skin->name }}
                        </h3>

                        <p class="text-zinc-300 text-xl">
                            {{ $skin->price }} RP
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

</div>

<div
    id="abilityModal"
    class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50">

    <div class="relative w-[90%] max-w-5xl">

        <button
            onclick="closeAbilityModal()"
            class="absolute -top-14 right-0 text-white text-5xl">

            ✕

        </button>

        <video
            id="abilityVideo"
            class="w-full rounded-3xl"
            controls
            autoplay>

            <source id="abilityVideoSource" src="" type="video/mp4">

        </video>

    </div>

</div>

<!-- MODAL SKIN -->
<div
    id="skinModal"
    class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50">

    <div class="relative w-[90%] max-w-6xl">

        <button
            onclick="closeSkinModal()"
            class="absolute -top-14 right-0 text-white text-5xl">

            ✕

        </button>

        <img
            id="skinImage"
            src=""
            class="w-full rounded-3xl border-4 border-pink-500">

    </div>

</div>

<script>

    function openAbilityModal(videoUrl)
    {
        document.getElementById('abilityModal').classList.remove('hidden');

        document.getElementById('abilityModal').classList.add('flex');

        const video = document.getElementById('abilityVideo');

        const source = document.getElementById('abilityVideoSource');

        source.src = videoUrl;

        video.load();

        video.play();
    }

    function closeAbilityModal()
    {
        const video = document.getElementById('abilityVideo');

        video.pause();

        video.currentTime = 0;

        document.getElementById('abilityModal').classList.add('hidden');

        document.getElementById('abilityModal').classList.remove('flex');
    }

    function openSkinModal(imageUrl)
    {
        document.getElementById('skinModal').classList.remove('hidden');
        document.getElementById('skinModal').classList.add('flex');

        document.getElementById('skinImage').src = imageUrl;
    }

    function closeSkinModal()
    {
        document.getElementById('skinModal').classList.add('hidden');
        document.getElementById('skinModal').classList.remove('flex');
    }

</script>

</body>
</html>
