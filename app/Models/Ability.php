<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $fillable = [

        'champion_id',

        'name',

        'description',

        'image',

        'video_url',

        'order'

    ];

    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
