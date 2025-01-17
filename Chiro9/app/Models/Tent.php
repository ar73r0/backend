<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tent extends Model
{
    protected $fillable = ['name', 'description', 'capacity', 'price', 'image'];

}
