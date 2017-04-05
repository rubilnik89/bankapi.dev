<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceId extends Model
{
    protected $fillable = ['lat', 'place_id', 'lon'];
}
