<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICAT</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Oleo+Script+Swash+Caps:wght@400;700&family=Poppins:ital,wght@0,400;0,500;1,200;1,400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap');
        
    </style>
</head>
<body style="background: white;">
    <div>
       <div class="haut">
            <img src="img/socediamn.png" style="position: absolute; left: -4.5%; top: -6.5%; width: 150px;" alt="">
       </div> 
       {{--<img src="img/socediamn.png" style="position: absolute; left: 40%; top: -4%; width: 20%; width: 125px;" alt="">--}}
       <div class="titre" style="position: absolute; width: 100%; top: 7%; line-height: -20px;">
           <h2 style="color: #aa0000b7; text-align: center; font-size: 18px; font-family: 'Poppins', sans-serif; font-weigth: 700; ">5<sup>ÈME</sup> </h2>
           <p style="position: absolute; padding-top: 0%; padding-bottom: 0%; width: 100%; top: 2.5%; color: #1a1a1ab7; text-align: center; font-size: 18px;">5<sup>TH</sup> </p>
       </div>
       <div style="line-height: 10px; position: absolute; top: 17%; width: 100%; display: flex; justify-content: center; flex-direction: column;  color: white; background: #79c2d0;">
            <h1 style="text-align: center; padding-top: 10px; ">{{ "CERTIFICAT DE PARTICIPATION" }}</h1>
            <h2 style="text-align: center; font-size: 20px;">CERTIFICATE OF PARTICIPATION</h2>
       </div>
       <div style="line-height: -10px; position: absolute; top: 33%; width: 100%; display: flex; justify-content: center; flex-direction: column;">
            <p style="text-align: center; padding-top: 10px;">Délivré au </p>
            <p style="text-align: center;"> <em>Delivered to</em></p>
       </div>
       <div style="line-height: -10px; position: absolute; top: 43%; width: 100%; display: flex; justify-content: center; flex-direction: column;">
            <h1 style="text-align: center;" >{{ $name }}</h1>
       </div>
       <div style=" position: absolute; top: 45%; width: 100%; display: flex; justify-content: center; flex-direction: column;">
            <p style="text-align: center; padding-top: 10px; font-size: 18px;">Pour sa participation  au <strong><em> 5 <sup>ème</sup> Congrès de la Société Camerounaise {{ "d'Endocrinologie, Diabète, Métabolisme et Nutrition" }} </em> <br></strong> organisé du <strong><em> 10 au 11 Novembre 2023</em></strong></p>
            <p style=" position: absolute; text-align: center; font-size: 20px; width: 100%; text-align: center; top: 9%;"> For its involvement to <strong><em> 5 <sup>th</sup> Congress of the Cameroon Society of Endocrinology, Diabetes, Metabolism and Nutrition</em></strong> from the <strong><em>10<sup>th</sup>  to 11<sup>th</sup> 2023</em></strong></p>
       </div>
       <div style=" position: absolute; top: 60%; width: 100%; display: flex; justify-content: center; flex-direction: column;">
            <p style="text-align: center; padding-top: 10px; font-size: 18px;"><strong>Lieu </strong> sous le thème :  <strong><em>« Diabète et Environnement ».</em></strong></p>
            <p style=" position: absolute; text-align: center; font-size: 17px; width: 100%; text-align: center; top: 5%;"><strong>Lieu </strong> under the theme:   <strong><em>« Diabetes and environment ».</p>
       </div>
       <div style=" position: absolute; top: 67%; width: 100%; display: flex; justify-content: center; flex-direction: column;">
            <p style="text-align: center; padding-top: 10px; font-size: 16px;">En foi de quoi, le présent certificat lui est délivré pour servir et valoir ce que de droit.</p>
            <p style=" position: absolute; text-align: center; font-size: 14px; width: 100%; text-align: center; top: 5%;"> <em>This certificate is issued to serve the purpose it might be required.</em> </p>
       </div>
       <div class="droit">
            <img src="img/haut.JPG" style="position: absolute; right: -5%; top: -7%; z-index: -10;" alt="">
       </div>
       <div class="droit" style="position:absolute;right:20%;bottom:-1%;width:300px;" >
          Signature
            {{-- <imgsrc="img/signature.png" style="position:absolute;right:20%;bottom:-1%;width:300px;"alt=""> --}}
       </div>
       <div class="gauche">
       <img src="img/bas.JPG" style="position: absolute; left: -5%; bottom: -7%;" alt="">
       </div>
       <div class="bas" >
            <img src="img/image1.png" style="position: absolute; right: -4.5%; bottom: -6.5%; width: 150px;" alt="">
       </div>   
        
        
           
    </div>
</body>
</html>