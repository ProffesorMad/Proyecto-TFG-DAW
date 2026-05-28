<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Champion;
use App\Models\Skin;
use Illuminate\Http\Request;

class ChampionController extends Controller
{
    public function index()
    {
        $champions = Champion::orderBy('id')->get();

        return view('champions.index', compact('champions'));
    }

    public function show(Champion $champion)
    {
        $champion->load('abilities', 'skins');

        return view('champions.show', compact('champion'));
    }

    public function create()
    {
        return view('champions.create');
    }

    public function store(Request $request)
    {
        $champion = Champion::create([

            'name' => $request->name,
            'description' => $request->description,
            'role' => $request->role,

            // SI NO HAY IMAGEN -> PLACEHOLDER
            'image' => $request->image ?: 'https://placehold.co/800x800/111111/facc15?text=Champion',

            'region' => $request->region,
            'damage_type' => $request->damage_type,
            'resource' => $request->resource,
            'release_year' => $request->release_year,

        ]);

        // HABILIDADES
        if ($request->abilities)
        {
            foreach ($request->abilities as $index => $ability)
            {
                if (!empty($ability['name']))
                {
                    Ability::create([

                        'champion_id' => $champion->id,

                        'name' => $ability['name'],

                        'description' => $ability['description'] ?? '',

                        'image' => $ability['image']
                            ?: 'https://placehold.co/300x300/111111/facc15?text=Skill',

                        'video_url' => $ability['video'] ?? '',

                        'order' => $index + 1,

                    ]);
                }
            }
        }

        // SKINS
        if ($request->skins)
        {
            foreach ($request->skins as $skin)
            {
                if (!empty($skin['name']))
                {
                    Skin::create([

                        'champion_id' => $champion->id,

                        'name' => $skin['name'],

                        'price' => $skin['price'] ?? 0,

                        'image' => $skin['image']
                            ?: 'https://placehold.co/500x700/111111/ec4899?text=Skin',

                    ]);
                }
            }
        }

        return redirect()->route('champions.index');
    }

    public function edit(Champion $champion)
    {
        $champion->load('abilities', 'skins');

        return view('champions.edit', compact('champion'));
    }

    public function update(Request $request, Champion $champion)
    {
        $champion->update([

            'name' => $request->name,
            'description' => $request->description,
            'role' => $request->role,

            'image' => $request->image
                ?: 'https://placehold.co/800x800/111111/facc15?text=Champion',

            'region' => $request->region,
            'damage_type' => $request->damage_type,
            'resource' => $request->resource,
            'release_year' => $request->release_year,

        ]);

        // BORRAR HABILIDADES ANTERIORES
        $champion->abilities()->delete();

        // CREAR NUEVAS
        if ($request->abilities)
        {
            foreach ($request->abilities as $index => $ability)
            {
                if (!empty($ability['name']))
                {
                    Ability::create([

                        'champion_id' => $champion->id,

                        'name' => $ability['name'],

                        'description' => $ability['description'] ?? '',

                        'image' => $ability['image']
                            ?: 'https://placehold.co/300x300/111111/facc15?text=Skill',

                        'video_url' => $ability['video'] ?? '',

                        'order' => $index + 1,

                    ]);
                }
            }
        }

        // BORRAR SKINS
        $champion->skins()->delete();

        // CREAR NUEVAS
        if ($request->skins)
        {
            foreach ($request->skins as $skin)
            {
                if (!empty($skin['name']))
                {
                    Skin::create([

                        'champion_id' => $champion->id,

                        'name' => $skin['name'],

                        'price' => $skin['price'] ?? 0,

                        'image' => $skin['image']
                            ?: 'https://placehold.co/500x700/111111/ec4899?text=Skin',

                    ]);
                }
            }
        }

        return redirect()->route('champions.show', $champion);
    }

    public function destroy(Champion $champion)
    {
        $champion->delete();

        return redirect()->route('champions.index');
    }
}
