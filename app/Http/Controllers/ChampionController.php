<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Champion;
use App\Models\Skin;
use Illuminate\Http\Request;

class ChampionController extends Controller
{
    private function checkAdmin()
    {
        if (
            !auth()->check()
            || auth()->user()->email !== 'Admin@gmail.com'
        )
        {
            abort(403);
        }
    }

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
        $this->checkAdmin();

        return view('champions.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        $champion = Champion::create([

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
        $this->checkAdmin();

        $champion->load('abilities', 'skins');

        return view('champions.edit', compact('champion'));
    }

    public function update(Request $request, Champion $champion)
    {
        $this->checkAdmin();

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

        $champion->abilities()->delete();

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

        $champion->skins()->delete();

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
        $this->checkAdmin();

        $champion->delete();

        return redirect()->route('champions.index');
    }
}
