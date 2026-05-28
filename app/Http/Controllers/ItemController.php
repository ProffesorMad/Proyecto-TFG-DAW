<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id')->get();

        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        Item::create([

            'name' => $request->name,

            'description' => $request->description,

            'type' => $request->type,

            'cost' => $request->cost,

            'stats' => $request->stats,

            'effect' => $request->effect,

            'image' => $request->image
                ?: 'https://placehold.co/400x400/111111/facc15?text=Objeto',

        ]);

        return redirect()->route('items.index');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $item->update([

            'name' => $request->name,

            'description' => $request->description,

            'type' => $request->type,

            'cost' => $request->cost,

            'stats' => $request->stats,

            'effect' => $request->effect,

            'image' => $request->image
                ?: 'https://placehold.co/400x400/111111/facc15?text=Objeto',

        ]);

        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }
}
