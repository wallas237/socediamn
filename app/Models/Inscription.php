<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'prenom',
        'ville',
        'pays',
        'grade',
        'specialite',
        'gender',
        'charge',
        'labo',
        'telephone',
        'titre',
        'fichier',
        'delegue'
        
    ];
}
