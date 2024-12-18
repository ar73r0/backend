<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    // Bescherm de velden die je kunt invullen
    protected $fillable = ['name', 'email', 'message'];

}
