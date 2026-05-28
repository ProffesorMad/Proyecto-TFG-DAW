<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    protected $fillable =
        [
            'name',
            'description',
            'game_modes',
            'cooldown',
            'image',
            'video_url'
        ];
}
