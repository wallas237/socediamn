<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EnqueteModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questionModel() : HasMany
    {
        return $this->hasMany(QuestionModel::class);
    }



    public function reponseModel():HasMany
    {
        return $this->hasMany(ReponseModel::class);
    }

    public function commentaireLibre():HasMany
    {
        return $this->hasMany(ReponseCommentaire::class);
    }

    public function scopeTitre($query, $idEntete){
        return $query->where('id', $idEntete);
    }

}
