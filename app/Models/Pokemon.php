<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'height', 'weight', 'health'];

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}