<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    protected $fillable = [
        'name',
        'description',
        'role',
        'image',
        'region',
        'damage_type',
        'resource',
        'release_year'
    ];

    public function abilities()
    {
        return $this->hasMany(Ability::class);
    }

    public function skins()
    {
        return $this->hasMany(Skin::class);
    }
}
