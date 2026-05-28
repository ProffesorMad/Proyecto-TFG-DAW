<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $items = Item::orderBy('id')->get();

        return view('items.index', compact('items'));
    }

    public function create()
    {
        $this->checkAdmin();

        return view('items.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

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
        $this->checkAdmin();

        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $this->checkAdmin();

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
        $this->checkAdmin();

        $item->delete();

        return redirect()->route('items.index');
    }
}
