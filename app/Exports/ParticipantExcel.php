<?php

namespace App\Exports;



use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class ParticipantExcel implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel.inscription-excel');
    }
}
