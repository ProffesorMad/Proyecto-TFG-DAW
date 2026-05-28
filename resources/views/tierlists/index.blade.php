@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-black text-white">

        {{-- HEADER --}}
        <header class="border-b border-yellow-600 bg-[#050505]">

            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="/"
                   class="flex items-center gap-4">

                    <img src="{{ asset('images/logo.png') }}"
                         class="w-14 h-14 rounded-full object-cover">

                    <h1 class="text-4xl font-black text-yellow-400">
                        Road To The Nexo
                    </h1>

                </a>

                <button id="downloadBtn"
                        class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-bold transition">

                    Descargar PNG

                </button>

            </div>

        </header>

        {{-- CONTENIDO --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            <h1 class="text-6xl font-black text-yellow-400 mb-5">
                Tier List Creator
            </h1>

            <p class="text-gray-400 text-xl mb-14">
                Arrastra campeones y crea tu propia tier list personalizada.
            </p>

            {{-- TIERLIST --}}
            <div id="tierlist"
                 class="space-y-3 mb-14 bg-black rounded-2xl inline-block w-full">

                @php

                    $tiers =
                    [
                        ['name' => 'S+', 'color' => 'bg-red-400 text-white'],
                        ['name' => 'S', 'color' => 'bg-orange-400 text-white'],
                        ['name' => 'A', 'color' => 'bg-yellow-300 text-black'],
                        ['name' => 'B', 'color' => 'bg-green-300 text-black'],
                        ['name' => 'C', 'color' => 'bg-cyan-300 text-black'],
                        ['name' => 'D', 'color' => 'bg-blue-400 text-white'],
                    ];

                @endphp

                @foreach($tiers as $tier)

                    <div class="flex rounded-2xl overflow-hidden border border-yellow-700 shadow-xl">

                        {{-- NOMBRE TIER --}}
                        <div class="{{ $tier['color'] }} w-28 flex items-center justify-center">

                            <input type="text"
                                   value="{{ $tier['name'] }}"
                                   class="tier-input bg-transparent text-center text-3xl font-black w-full outline-none">

                        </div>

                        {{-- ZONA DROP --}}
                        <div class="tier-row flex-1 min-h-[110px] bg-[#111111] flex flex-wrap gap-2 p-3"
                             ondrop="drop(event)"
                             ondragover="allowDrop(event)">

                        </div>

                    </div>

                @endforeach

            </div>

            {{-- CAMPEONES --}}
            <div class="bg-[#111111] border border-yellow-700 rounded-2xl p-6 shadow-xl">

                <h2 class="text-4xl font-black text-yellow-400 mb-8">
                    Campeones
                </h2>

                <div class="flex flex-wrap gap-4 justify-center">

                    @foreach($champions as $champion)

                        <div class="champion-card"
                             id="champion-{{ $champion->id }}">

                            <img src="{{ $champion->image }}"
                                 draggable="true"
                                 ondragstart="drag(event)"
                                 id="img-{{ $champion->id }}"
                                 class="w-20 h-20 object-cover rounded-xl border border-gray-700 shadow-lg cursor-grab">

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    </div>

    <script>

        function allowDrop(ev)
        {
            ev.preventDefault();
        }

        function drag(ev)
        {
            ev.dataTransfer.setData("text", ev.target.parentElement.id);
        }

        function drop(ev)
        {
            ev.preventDefault();

            const data = ev.dataTransfer.getData("text");

            const element = document.getElementById(data);

            let dropZone = ev.target;

            while (!dropZone.classList.contains('tier-row'))
            {
                dropZone = dropZone.parentElement;

                if (!dropZone)
                {
                    return;
                }
            }

            dropZone.appendChild(element);
        }

        document.getElementById('downloadBtn')
            .addEventListener('click', function ()
            {
                const tierlist = document.getElementById('tierlist');

                html2canvas(tierlist,
                    {
                        backgroundColor: "#000000",
                        scale: 2,
                        useCORS: true
                    })
                    .then(function(canvas)
                    {
                        const image = canvas.toDataURL("image/png");

                        const link = document.createElement('a');

                        link.href = image;

                        link.download = 'tierlist.png';

                        document.body.appendChild(link);

                        link.click();

                        document.body.removeChild(link);
                    });
            });

    </script>

@endsection
