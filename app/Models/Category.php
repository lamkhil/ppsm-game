<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
