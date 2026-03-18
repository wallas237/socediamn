<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgeListe extends Model
{
    use HasFactory;
    protected $fillable = ['matricule_id_participant'];
}
