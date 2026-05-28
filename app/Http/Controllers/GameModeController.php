<?php

namespace App\Http\Controllers;

use App\Models\GameMode;
use Illuminate\Http\Request;

class GameModeController extends Controller
{
    public function index()
    {
        $gameModes = GameMode::orderBy('id')->get();

        return view('game-modes.index', compact('gameModes'));
    }

    public function create()
    {
        return view('game-modes.create');
    }

    public function store(Request $request)
    {
        GameMode::create([
            'name' => $request->name,

            'description' => $request->description,

            'image' => $request->image
                ?: 'https://placehold.co/1200x500/111111/facc15?text=Game+Mode',

            'availability' => $request->availability,

            'max_players' => $request->max_players
        ]);

        return redirect()->route('game-modes.index');
    }

    public function edit(GameMode $game_mode)
    {
        return view('game-modes.edit', compact('game_mode'));
    }

    public function update(Request $request, GameMode $game_mode)
    {
        $game_mode->update([
            'name' => $request->name,

            'description' => $request->description,

            'image' => $request->image
                ?: 'https://placehold.co/1200x500/111111/facc15?text=Game+Mode',

            'availability' => $request->availability,

            'max_players' => $request->max_players
        ]);

        return redirect()->route('game-modes.index');
    }

    public function destroy(GameMode $game_mode)
    {
        $game_mode->delete();

        return redirect()->route('game-modes.index');
    }
}
