<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReponseModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeEnqueReponse($query, $enqueteId)
    {
        return $query->where('enquete_model_id', $enqueteId)->get();
    }

    public function scopeEnqueteReponse($query, $enqueteId, $intervalInferieur, $intervalSuperieur){
        //reponse entre [1, 2]
        return $query->where('enquete_model_id', $enqueteId)
        ->whereBetween('note', [$intervalInferieur, $intervalSuperieur])
        ->get();
    }

    public function scopeEnqueteReponsePasDutoutSatisfait($query, $enqueteId){
        //reponse entre [1, 2]
        return $query->where('enquete_model_id', $enqueteId)
        ->whereBetween('note', [1, 2])
        ->get();
    }
    public function scopeEnqueteReponsePeuSatisfait($query, $enqueteId){
        //reponse entre [3, 4]
        return $query->where('enquete_model_id', $enqueteId)
        ->whereBetween('note', [3, 4])
        ->get();
    }
    public function scopeEnqueteReponseNiSatisfait($query, $enqueteId){
        //reponse entre [5, 6]
        return $query->where('enquete_model_id', $enqueteId)
        ->whereBetween('note', [5, 6])
        ->get();
    }
    public function scopeEnqueteReponseSatisfait($query, $enqueteId){
        //reponse entre [7, 8]
        return $query->where('enquete_model_id', $enqueteId)
        ->whereBetween('note', [7, 8])
        ->get();
    }
    public function scopeEnqueteReponseTresSatisfait($query, $enqueteId){
        //reponse entre [9, 10]
        return $query->where('enquete_model_id', $enqueteId)
        ->whereBetween('note', [9, 10])
        ->get();
    }

}
