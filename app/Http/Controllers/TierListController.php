<?php

namespace App\Http\Controllers;

use App\Models\Champion;

class TierListController extends Controller
{
    public function index()
    {
        $champions = Champion::all();

        return view('tierlists.index', compact('champions'));
    }
}
