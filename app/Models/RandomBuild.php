<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RandomBuild extends Model
{
    protected $fillable =
        [
            'user_id',
            'champion_id',
            'lane',
            'items',
            'spells'
        ];

    protected $casts =
        [
            'items' => 'array',
            'spells' => 'array'
        ];

    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
