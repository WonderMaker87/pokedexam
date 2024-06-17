<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Pokemon_type extends Pivot
{
    protected $table = 'pokemon_type';
}
