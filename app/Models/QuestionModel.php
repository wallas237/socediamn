<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function responseModel(){
        return $this->hasMany(ReponseModel::class);
    }

    public function scopeEnqueteQuestion($query, $idEnquete){
        return $query->where('enquete_model_id', $idEnquete);
    }
}
