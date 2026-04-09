<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToImage\Pdf;

class LivreAbstractController extends Controller
{
    function convertirPdfEnImage()
    {
        $pdf = new Pdf(storage_path('app/livre_abstract.pdf'));
        $pages = $pdf->getNumberOfPages();

        for ($i = 1; $i <= $pages; $i++) {
            $pdf->setPage($i)
                ->saveImage(storage_path("app/public/pagesabstract/page_$i.jpg"));
        }
    }

    function getImageAbstract()
    {
        $url = "https://api.socediamn.org/";
        //$urllocal = "http://10.0.2.2:8000/";
        $images = Storage::disk('public')->files('pagesabstract');
        $verifier = natsort($images);
        $allImage = [];
        foreach($images as $image){
           array_push($allImage, "$url".$image);
        }
        
       
        return response()->json([
            'total' => count($images),
            'images' => $allImage,
            // 'base_url' => url('https://api.socediamn.org/')
        ]);
    }
}
