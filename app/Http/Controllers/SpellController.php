<?php

namespace App\Http\Controllers;

use App\Models\Spell;
use Illuminate\Http\Request;

class SpellController extends Controller
{
    public function index()
    {
        $spells = Spell::orderBy('id')->get();

        return view('spells.index', compact('spells'));
    }

    public function create()
    {
        return view('spells.create');
    }

    public function store(Request $request)
    {
        Spell::create([
            'name' => $request->name,
            'description' => $request->description,
            'game_modes' => $request->game_modes,
            'cooldown' => $request->cooldown,

            'image' => $request->image
                ?: 'https://placehold.co/300x300/111111/facc15?text=Spell',

            'video_url' => $request->video_url
        ]);

        return redirect()->route('spells.index');
    }

    public function edit(Spell $spell)
    {
        return view('spells.edit', compact('spell'));
    }

    public function update(Request $request, Spell $spell)
    {
        $spell->update([
            'name' => $request->name,
            'description' => $request->description,
            'game_modes' => $request->game_modes,
            'cooldown' => $request->cooldown,

            'image' => $request->image
                ?: 'https://placehold.co/300x300/111111/facc15?text=Spell',

            'video_url' => $request->video_url
        ]);

        return redirect()->route('spells.index');
    }

    public function destroy(Spell $spell)
    {
        $spell->delete();

        return redirect()->route('spells.index');
    }
}
