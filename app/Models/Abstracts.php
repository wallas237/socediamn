<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abstracts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'civilite',
        'email',
        'telephone',
        'adresse',
        'fichier',
        'titre'

    ];
}
