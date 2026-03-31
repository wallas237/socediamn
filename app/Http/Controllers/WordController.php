<?php

namespace App\Http\Controllers;

use App\Models\Abstracts;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\DB;
use App\Models\CompteTelechargement;

class WordController extends Controller
{
    public function createWord($id)
    {
        $abstract = Abstracts::find($id);
        //  return $abstract;
        // Créer un nouvel objet PhpWord
        $phpWord = new PhpWord();

        // Ajouter une section
        $section = $phpWord->addSection();

        // Ajouter un titre

        // $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        // $fontStyle->setBold(true);
        // $fontStyle->setName('Tahoma');
        // $fontStyle->setSize(16);
        // $globalFontStyle =  array('name' => 'Tahoma', 'size' => 13, 'bold' => true);
        $taille = 0;
        $numero = DB::table('compte_telechargements')->where('abstract_id', $id)->first();
        if (!empty($numero)) {
            $taille = strlen($numero->numero_abstract) == 1 ? "0" . $numero->numero_abstract : $numero->numero_abstract;
        } else {
            $max = DB::table('compte_telechargements')->where('type', $abstract->type_abstract)->max('id');
            $nombre = 1;

            if ($max > 0) {
                $numeroAbstract = DB::table('compte_telechargements')->where('id', $max)->first();
                if (!empty($numeroAbstract)) {
                    $taille += $numeroAbstract->numero_abstract;
                    $nombre += $numeroAbstract->numero_abstract;
                }
            } else {
                $max++;
                $taille = strlen($max) == 1 ? "0" . $max : $max;
            }

            $compteTelechargements = CompteTelechargement::create([
                'abstract_id' => $id,
                'type' => $abstract->type_abstract,
                'numero_abstract' => $nombre
            ]);
        }
        $typeAstract = $abstract->type_abstract == "Orale" ? "C" : "P";
        $globalFontStyle =  array('name' => 'Times New Roman', 'size' => 15, 'bold' => true);
        $section->addText($typeAstract . "" . $taille . ". " . ucfirst(mb_strtolower($abstract->titre)), $globalFontStyle);

        $section->addText("");
        $tableauAffiliation = [];
        $affiliation = explode(';', $abstract->affiliation);
        $affiliation2 = explode('/', $abstract->affiliation);
        if (count($affiliation) > 1) {
            $tableauAffiliation = $affiliation;
        } elseif (count($affiliation2) > 1) {
            $tableauAffiliation = $affiliation2;
        } elseif (count($affiliation) == 1 && count($affiliation2) == 1) {
            $tableauAffiliation = $affiliation;
        } else {
            $tableauAffiliation = $affiliation;
        }

        $globalFontStyle2 =  array('name' => 'Times New Roman', 'size' => 12);




        $tableauAuteur = [];

        $auteurs = explode(';', $abstract->auteurs);
        $auteurs2 = explode('/', $abstract->auteurs);
        $auteurs3 = explode('(;)', $abstract->auteurs);
        $auteurs4 = explode('(/)', $abstract->auteurs);

        if (count($auteurs) > 1 && count($auteurs3) == 1) {
            $tableauAuteur = $auteurs;
        } elseif (count($auteurs) >= 1 && count($auteurs3) > 1) {
            $tableauAuteur = $auteurs3;
        } elseif (count($auteurs2) > 1 && count($auteurs4) == 1) {
            $tableauAuteur = $auteurs2;
        } elseif (count($auteurs2) >= 1 && count($auteurs4) > 1) {
            $tableauAuteur = $auteurs4;
        } elseif (count($auteurs) == 1 && count($auteurs2) == 1) {
            $tableauAuteur = $auteurs;
        } else {
            $tableauAuteur = $auteurs2;
        }


        $text = "";
        $tailleTableau = count($tableauAuteur) - 1;

        for ($i = 0; $i <= $tailleTableau; $i++) {
            if ($i < $tailleTableau) {
                $text .= $tableauAuteur[$i] . ', ';
            } else {
                $text .= $tableauAuteur[$i];
            }
        }

        $globalFontStyle3 =  array('name' => 'Times New Roman', 'size' => 14);
        $section->addText($text, $globalFontStyle2);
        $section->addText("");
        for ($i = 0; $i < count($tableauAffiliation); $i++) {
            $section->addText("", $globalFontStyle2);
            $section->addText($tableauAffiliation[$i], $globalFontStyle2);

        }
        $section->addText("", $globalFontStyle2);
        $libelleFontStyle =  array('name' => 'Times New Roman', 'size' => 11, 'bold' => true);
        $section->addText("Correspondant: ", $libelleFontStyle);
        $section->addText($abstract->correspondant . ", " . $abstract->email_correspondant, $globalFontStyle3);

        $section->addText("", $globalFontStyle2);
        $section->addText("Introduction : ", $libelleFontStyle);

        if (strlen($abstract->introduction) > 0) {
            $section->addText(ucfirst($abstract->introduction), $globalFontStyle3);
        }
        $section->addText("Méthode : ", $libelleFontStyle);
        if (strlen($abstract->methode) > 0) {
            $section->addText(ucfirst($abstract->methode), $globalFontStyle3);
        }

        $section->addText("Résultats : ", $libelleFontStyle);
        if (strlen($abstract->resultat) > 0) {
            $section->addText(ucfirst($abstract->resultat), $globalFontStyle3);
        }
        $section->addText("Conclusion : ", $libelleFontStyle);
        if (strlen($abstract->conclusion) > 0) {
            $section->addText(ucfirst($abstract->conclusion), $globalFontStyle3);
        }

        $section->addText("Mots clés : ", $libelleFontStyle);
        if (strlen($abstract->mot_cle) > 0) {
            $section->addText($abstract->mot_cle, $globalFontStyle3);
        }






        // Sauvegarder le fichier dans un chemin spécifique
        //$filePath = public_path('Documents/mon_document.docx');
        $filePath = public_path($abstract->name . '.docx');
        //$filePath = public_path('Documents/mon_document.docx');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filePath);

        // Retourner le fichier au navigateur
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
