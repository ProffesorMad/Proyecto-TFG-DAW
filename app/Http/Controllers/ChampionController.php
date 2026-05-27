<?php

namespace App\Http\Controllers;

use App\Models\Champion;
use Illuminate\Http\Request;

class ChampionController extends Controller
{
    public function index()
    {
        $champions = Champion::all();

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

    }

    public function edit(Champion $champion)
    {
        return view('champions.edit', compact('champion'));
    }

    public function update(Request $request, Champion $champion)
    {

    }

    public function destroy(Champion $champion)
    {

    }
}
