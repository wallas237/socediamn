<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PrensenceCongresParjour implements FromView
{
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $inscriptions = DB::table('inscriptions')
        ->join('scan_presences', 'inscriptions.id', '=', 'scan_presences.invite_id')
        ->select('inscriptions.*')
        ->where('scan_presences.session_id', $this->id->id)
        ->distinct()
        ->get();

        return view('presence.presence-excel', ['inscriptions'=>$inscriptions, 'session'=>$this->id]);
    }
}
