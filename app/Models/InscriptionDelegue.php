<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscriptionDelegue extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'delegues';
    public $timestamps = false;
    protected $fillable = [
        'nom',
        'email',
        'labo_id',
        'titre',
        /*'stand',
        'symposium',
        'specialiste',
        'medecin',
        'infirmier',
        'etudiant',
        'publicite',*/
    ];
}
