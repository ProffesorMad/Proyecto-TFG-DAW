<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
