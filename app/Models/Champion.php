<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    public function abilities()
    {
        return $this->hasMany(Ability::class);
    }

    public function skins()
    {
        return $this->hasMany(Skin::class);
    }
}
