<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    protected $fillable = [

        'champion_id',

        'name',

        'price',

        'image'

    ];

    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
