<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name', 'place_id', 'options', 'types', 'photo', 'photos'];
}
