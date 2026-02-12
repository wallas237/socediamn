<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteOrganisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'name',
        'prenom',
        'email',
        'service',
        'telephone',
    ];
}
