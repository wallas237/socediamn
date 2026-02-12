<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Delegue;
use App\Models\Grade;
use App\Models\Laboratoire;
use App\Models\Specialite;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    function allSpecialite(){
        return Specialite::orderBy('speciality', 'asc')->get();
    }

    function allSgrade(){
        return Grade::orderBy('titre', 'asc')->get();
    }

    function allLabo(){
        return Laboratoire::orderBy('labo', 'asc')->get();
    }
    function allDelegue(){

    }
}
