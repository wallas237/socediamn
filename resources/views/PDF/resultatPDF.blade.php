<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            /** Define the margins of your page **/
            @page {
                margin-top: 200px;
                margin-bottom:  25px;
            }

            header {
                position: fixed;
                top: -150px;
                left: 0px;
                right: 0px;
                height: 100px;
                font-size: 20px !important;

                /** Extra personal styles
                background-color: #008B8B; **/
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                font-size: 20px !important;

                /** Extra personal styles **/
                background-color: #008B8B;
                color: white;
                text-align: center;
                line-height: 35px;
            }
        </style>
</head>
<body>
    <header>
    <div style="width: auto; margin-left: 20%; margin-top: 0%; padding-left: 10px; text-align: left; border: 1px solid black;">
        <strong>NOMS ET PRENOMS </strong> : <?php echo $patient->nom_prenom; ?>
        <strong>PRESCRIPTEUR : </strong><?php 
        if(empty($referent)){
            echo $personnel->nom_prenom_personnel;
        }else{
            echo $referent->nom_referent;
        }
                
         ?>
    </div>
    </header>
    <footer>
       
        <strong>Signature</strong>
      
           
    </footer>
    <div style="width: 70%; margin-left: 20%; margin-top: 10%; margin-right: 0%;">
   
    <?php 
        $tabCat = array();
        $i = 0 ;

        foreach($categorie as $k=>$v){
            if(!in_array($v->categorie, $tabCat)){
                $tabCat[$i] = $v->categorie;
                $i++;
            }
            
        }
        $tableauVerifier = array();
        $cpteExamen = 0;
        for($cpte=0; $cpte < sizeof($tabCat); $cpte++){
            $resultats =DB::table('resultat_labo')->where('numero_facture', $code)
                                                  ->where('categorie', $tabCat[$cpte])
                                                  ->get();
        ?>
            <h3 style="text-decoration: underline;"><?php echo $tabCat[$cpte] ?></h3>
            <table style="border-collapse: collapse;">
        <?php
            foreach($resultats as $k=>$v){
                $tableauVerifier[$cpteExamen] = $v->matricule_produit."_".$v->numero_facture;
    ?>
            <tr>    <td style="border-top: 0.25px solid black; border-bottom: 0.25px solid black;"><?php echo html_entity_decode($v->resultat)  ?></td> </tr>
    <?php
                $cpteExamen++;
            }
        ?>
            </table>
        <?php
        }

        $autres = DB::table('resultat_labo')->where('numero_facture', $code)->distinct()->get();
       
       foreach($autres as $k=>$v){
           if(!in_array($v->matricule_produit."_".$v->numero_facture, $tableauVerifier)){
    ?>
             <p style="padding: 0%; border: 0.5px solid black;"><?php echo html_entity_decode($v->resultat)  ?></p> 
    <?php
           }
       }
    ?>

</div>
</body>
</html>