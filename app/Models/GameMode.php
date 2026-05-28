<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameMode extends Model
{
    protected $fillable =
        [
            'name',
            'description',
            'image',
            'availability',
            'max_players'
        ];
}
