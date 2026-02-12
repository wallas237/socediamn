<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ "4ème congrès de la SOCEDIAMN" }}</title>
        <link href="/assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="/aws/all.min.css" type="text/css">
        <link rel="stylesheet" href="/aws/fontawesome.min.css" type="text/css">
        
        <link href="/css/forms.css" rel="stylesheet">
        <link href="/assets/css/shasha.css" rel="stylesheet">
       
        <style>
            .container{
                display: flex;
                align-items: center;
                justify-content: center;

            }

            .container .libelle{
                display: flex;
                align-items: center;
                justify-content: center;
                
            }

            .container .libelle div{
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 10px;
                border: 1px solid black;
            }

            .container .libelle div a{
                text-decoration: none;
                font-size: 20px;
                font-weight: bold;
            }

            .container .libelle div:nth-child(1):hover a{
                color: #008000ff;
            }

            .container .libelle div:nth-child(1) a{
                color: #ffff;
            }

            .container .libelle div:nth-child(2):hover a{
                color: #008080ff;
            }

            .container .libelle div:nth-child(2) a{
                color: #ffff;
            }


            .container .libelle div:nth-child(3):hover a{
                color: #800000ff;
            }

            .container .libelle div:nth-child(3) a{
                color: #ffff;
            }
        </style>

    
</head>
<body>
    
    <div class="container-fluid jumbotron-fluid stay mt-5 pt-5 pb-5" >
        <h1 class="text-center" style=" padding-top: 15px;">4<sup>ème</sup> Congrès de la Société Camerounaise {{ "d'Endocrinologie, Diabète, Métabolisme et Nutrition" }}</h1>
         <h3 class="text-center" style=" padding-top: 15px; font-style: italic;">Diabète et Environnement</h3>
         <h4 class="text-center" style=" font-style: italic;"></h4>
         <br>
        <p class="text-center mt-2" style="color: #550000fa;"> <h3 style="text-align: center;"> <strong>09 au 11  Novembre 2023 à {{ "l'Hôtel Vallée des Princes à Douala" }}</strong>   </h3></p>
        <div class="input-group mt-4 mx-auto" style="max-width: 640px">
                
    </div>
    <header style="padding-bottom: 20px;">
        {{--  <div class="container">
            <div class="libelle">
                    
                <div> <a href="/inscription-socediamn"> Inscription des participants</a>  </div>
                <!--<div><a href="/inscription-delegue">Inscription des Laboratoires</a></div>-->
                <div><a href="/soumettre-un-resume">Soumettre une Communication</a></div>
                  

            </div>
        </div>  --}}
        <script>
            let button = document.querySelectorAll('.libelle div')
        let i = 0
        button.forEach(elt=>{
            if(i==0){
                elt.style.border = "1px solid #008000ff"
                elt.style.backgroundColor = "#008000ff"
               elt.addEventListener('mouseleave', ()=>{
                   elt.style.backgroundColor = "#008000ff"
               })

               elt.addEventListener('mouseover', ()=>{
                   elt.style.backgroundColor = "transparent"
               })
                
            }else if(i==1){
                elt.style.border = "1px solid #008080ff"
                elt.style.backgroundColor = "#008080ff"
                elt.addEventListener('mouseleave', ()=>{
                   elt.style.backgroundColor = "#008080ff"
               })

               elt.addEventListener('mouseover', ()=>{
                   elt.style.backgroundColor = "transparent"
               })
                
            }else if(i==2){
                elt.style.border = "1px solid #800000ff"
                elt.style.backgroundColor = "#800000ff"
                elt.addEventListener('mouseleave', ()=>{
                   elt.style.backgroundColor = "#800000ff"
               })

               elt.addEventListener('mouseover', ()=>{
                   elt.style.backgroundColor = "transparent"
               })
            }

            i++
        })
        </script>
    </header>