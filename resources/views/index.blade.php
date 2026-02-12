<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 ème Congrès de la SOCEDIAMN </title>
    <link rel="stylesheet" href="/css/style2.css" >
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@400;700&family=Poppins:wght@200&family=Roboto:ital,wght@0,100;0,300;0,400;0,400;0,700;1,100;1,300;1,400;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    
    <header style="margin: 0; padding: 0;">
        <div class="container" style="margin: 0; padding: 0;">
            <div class="item">
                <img src="/img/affiche.jpeg" alt="4 ème Congrès de la société camerounaise">
            </div>
            <div class="item-2">
                <div class="titre">
                    <h1> BIENVENUE  AU 4<sup>ème</sup> Congrès de la Société Camerounaise {{ "d'Endocrinologie, Diabète, Métabolisme et Nutrition" }}</h1>
                </div>
                <div class="theme">
                    <h2>Diabète et Environnement</h2>
                </div>
                
                <h3 style="text-align: center; font-weight: 700;"> <strong>09 au 11  Novembre 2023 à {{ "l'Hôtel" }} Vallée des Princes à Douala</strong>   </h3>

                <div class="libelle">
                    
                    <button> <a href="/inscription-socediamn"> Inscription des participants </a>  </button>
                   
                    <button><a href="/soumettre-un-resume">Soumettre une Communication</a></button>
                  

                </div>
            </div>
            
        </div>
    </header>

    <script>
        let button = document.querySelectorAll('button')
        let i = 0
        button.forEach(elt=>{
            if(i==0){
                elt.style.border = "1px solid #008000ff"
               elt.addEventListener('mouseover', ()=>{
                   elt.style.backgroundColor = "#008000ff"
               })

               elt.addEventListener('mouseleave', ()=>{
                   elt.style.backgroundColor = "transparent"
               })
                
            }else if(i==1){
                elt.style.border = "1px solid #008080ff"
                elt.addEventListener('mouseover', ()=>{
                   elt.style.backgroundColor = "#008080ff"
               })

               elt.addEventListener('mouseleave', ()=>{
                   elt.style.backgroundColor = "transparent"
               })
                
            }else if(i==2){
                elt.style.border = "1px solid #800000ff"
                elt.addEventListener('mouseover', ()=>{
                   elt.style.backgroundColor = "#800000ff"
               })

               elt.addEventListener('mouseleave', ()=>{
                   elt.style.backgroundColor = "transparent"
               })
            }

            i++
        })

        window.navigator.serviceWorker.register('js/sw/sw.js')
        function requestPermission(){
            Notification.requestPermission().then((permission)=>{
                if (permission === 'granted'){

                }
            })
        }
    </script>
    <button onclick="requestPermission()">
        Cliquez ici
    </button>
</body>
</html>