<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemon';

    protected $fillable = [
        'name',
        'hp',
        'weight',
        'height',
        'img_path',
        'primary_type_id',
        'secondary_type_id'
    ];

    public function types()
    {
        return $this->belongsToMany(Type::class, 'pokemon_type', 'pokemon_id', 'type_id');
    }

    public function primaryType()
    {
        return $this->belongsTo(Type::class, 'primary_type_id');
    }

    public function secondaryType()
    {
        return $this->belongsTo(Type::class, 'secondary_type_id');
    }
    
}
