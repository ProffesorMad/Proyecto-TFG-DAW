<?php

namespace App\Http\Controllers;

use App\Models\Champion;
use App\Models\Item;
use App\Models\Spell;
use App\Models\RandomBuild;
use Illuminate\Http\Request;

class RandomBuildController extends Controller
{
    public function index()
    {
        return view('randomizer.index');
    }

    public function generate()
    {
        $champion = Champion::inRandomOrder()->first();

        $lanes =
            [
                'Top',
                'Mid',
                'ADC',
                'Support',
                'Jungla'
            ];

        $lane = $lanes[array_rand($lanes)];

        $boots = Item::whereRaw('LOWER(type) = ?', ['bota'])
            ->inRandomOrder()
            ->first();

        $normalItems = Item::whereRaw('LOWER(type) != ?', ['bota'])
            ->inRandomOrder()
            ->get()
            ->unique('id')
            ->take(5)
            ->values();

        $items = collect();

        foreach ($normalItems as $item)
        {
            $items->push($item);
        }

        $items->push($boots);


        if ($lane === 'Jungla')
        {
            $smite = Spell::where('name', 'Aplastar')->first();

            $otherSpell = Spell::where('name', '!=', 'Aplastar')
                ->inRandomOrder()
                ->first();

            $spells =
                [
                    $smite,
                    $otherSpell
                ];
        }
        else
        {
            $spells = Spell::where('name', '!=', 'Aplastar')
                ->inRandomOrder()
                ->take(2)
                ->get();
        }

        return view('randomizer.index',
            [
                'champion' => $champion,
                'lane' => $lane,
                'items' => $items,
                'spells' => $spells
            ]);
    }

    public function save(Request $request)
    {
        RandomBuild::create(
            [
                'user_id' => auth()->id(),

                'champion_id' => $request->champion_id,

                'lane' => $request->lane,

                'items' => json_decode($request->items),

                'spells' => json_decode($request->spells)
            ]);

        return redirect()
            ->route('randomizer.index')
            ->with('success', 'Build guardada correctamente');
    }

    public function myBuilds()
    {
        $builds = RandomBuild::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('randomizer.builds', compact('builds'));
    }
}
