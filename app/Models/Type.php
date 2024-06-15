<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'color', 'img_path'];

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class);
    }

    public function attacks()
    {
        return $this->hasMany(Attack::class);
    }
}