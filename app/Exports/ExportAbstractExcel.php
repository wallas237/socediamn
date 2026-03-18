<?php

namespace App\Exports;

use App\Models\Abstracts;
use App\Models\ComOraleValide;
use App\Models\PosterValide;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportAbstractExcel implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excel.liste-abstracts', [
            'orales'=>ComOraleValide::all(),
            'affichees'=>PosterValide::all(),
        ]);
    }
}
