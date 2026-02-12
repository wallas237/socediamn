<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    //
    /*
   function generatorPDF($id){

        $inscr = DB::table('users')->where('id', $id)->first();
        $name = $inscr->name;
        $data=[
            'name'=>$name,

        ];
        //$pdf = PDF::loadView('PDF.mstft', $data)
                           // ->setPaper('a4');
        //$pdf = PDF::loadView('PDF.certificate', $data)
                          //  ->setPaper('a4', 'landscape');
        //return $pdf->stream();invitationPDF

       // return $pdf->download($inscr->name.'.pdf');
       return view('PDF.mstft');
   }*/
    function generatorPDF($id)
    {

        $inscr = DB::table('inscriptions')->where('id', $id)->first();
        $name = $inscr->titre . " " . $inscr->name . " " . $inscr->prenom;
        $data = [
            'name' => $name,

        ];
        $pdf = PDF::loadView('PDF.certificate', $data)
            ->setPaper('a4', 'landscape');
        return $pdf->stream();

        // return $pdf->download($inscr->name.'.pdf');
    }




    function invitationPDF($id)
    {
        $inscr = DB::table('inscriptions')->where('id', $id)->first();
        $name = ucwords($inscr->titre).' '.strtoupper($inscr->name).' '.ucwords($inscr->prenom);
        $data = [
            'name' => $name,
            'titre' => ucwords($inscr->titre),
            'nom' => strtoupper($inscr->name),
            'ville' => $inscr->ville . '/' . $inscr->pays

        ];
        $pdf = PDF::loadView('PDF.invitation', $data);
        return $pdf->stream();
    }

    function invitationEnPDF($id)
    {
        $inscr = DB::table('inscriptions')->where('id', $id)->first();
        $name = ucwords($inscr->titre).' '.strtoupper($inscr->name).' '.ucwords($inscr->prenom);
        $data = [
            'name' => $name,
            'titre' => ucwords($inscr->titre),
            'nom' => strtoupper($inscr->name),
            'ville' => $inscr->ville . '/' . $inscr->pays

        ];
        $pdf = PDF::loadView('PDF.lettre', $data);
        return $pdf->stream();
    }

    function facturePDF($id)
    {
        $inscr = DB::table('inscriptions')->where('id', $id)->first();
        $info = DB::table('inscriptions')
                ->join('specialites', 'inscriptions.specialite', '=', 'specialites.id')
                ->where('inscriptions.id', $id)
                ->get();

        $name = ucwords($inscr->titre).' '.strtoupper($inscr->name).' '.ucwords($inscr->prenom);
        $data = [
            'nom' => $name,
            'telephone' => $inscr->telephone,
            'email' => $inscr->email,
            'date' => $inscr->created_at,
            'infos'=>$info,
            'id'=>$inscr->id

        ];
        $pdf = PDF::loadView('PDF.facture', $data);
        return $pdf->stream();
    }

    function factureLaboPDF($id)
    {
        $inscr = DB::table('laboratoires')->where('id', $id)->first();
        $info = DB::table('inscriptions')
                ->join('specialites', 'inscriptions.specialite', '=', 'specialites.id')
                ->where('inscriptions.labo', $id)
                ->get();

        $name = $inscr->labo;
        $data = [
            'nom' => $name,
            'infos'=>$info,
            'id'=>$inscr->id

        ];
        $pdf = PDF::loadView('PDF.recu-laboratoire', $data);
        return $pdf->stream();
    }
}
