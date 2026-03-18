<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ "Lettre d'invitation" }}</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }

        .entete {
            width: 100%;
            display: flex !important;
            justify-content: space-between;

        }

        .entete .img {
            padding: 25px 20px 10px 40px;
        }

        .h {
            position: absolute;
            right: 10%;
            top: 4%;
            text-align: center;
        }

        .h h4:first-child {
            color: red;
            font-style: italic;
        }

        .h h4:last-child {
            color: #003380ff;
            font-style: italic;
        }

        .gauche {
           
           /* background: #deebf7;*/
            margin-left: 20px;
            margin-top: 20px;
            padding-bottom: 20px;
            padding-top: 10px;
            text-align: center;
            position: absolute;
        }
        .gauche img{
            width: 110%;
        }
        .separateur{
            position: absolute;
            left: 30%;
        }
        

        .date-jour{
            position: absolute;
            right: 20%;
            top: 15%;
        }
        .destinataire{
            position: absolute;
            right: 10%;
            top: 30%;
        }
        .objet{
            width: 55%;
            margin-left: 33%;
            position: absolute;
            top: 40%;
            padding-right: 10%;
        }
        .politesse{
            position: absolute;
            margin-left: 33%;
            top: 48%;
        }

        .droit{
            position: absolute;
            margin-left: 33%;
            top: 50%;
            padding-right: 8%;
            line-height: 25px;
        }

        .signature{
            position: absolute;
            top: 80%;
            left: 32%;
            width: 40%;
        }
        .signature2{
            position: absolute;
            top: 80%;
            left: 65%;
            width: 40%;
        }
    </style>
</head>

<body>
    <div class="entete">
        <div class="img">
            <img src="img/socediamn.png" alt="4ème congrès de la socediamn">
        </div>
        <div class="h">
            <h4>Société Camerounaise d’Endocrinologie, Diabétologie, Métabolisme et Nutrition</h4>
            <h4> Cameroon Society of Endocrinology, Diabetology, Metabolism and Nutrition</h4>
        </div>
    </div>
    <div class="gauche">
        <img src="img/lettresocediamn.JPG" alt="4ème congrès de la socediamn">
        
    </div>
    <div class="separateur">
        <img src="img/separateursocediamn.JPG" alt="4ème congrès de la socediamn">
    </div>
    <div class="date-jour">
        <h4>Douala, <span> le </span><span>{{ date('d') }} </span>  <span>
            @if(date('m')== '09')
                {{ "Septembre" }}
            @elseif(date('m')== '10')
                  {{ "Octobre" }}
            @else
            @endif
        </span>  <span>{{ date('Y') }} </span></h4>
    </div>
    <div class="destinataire">
        <h3>A {{ $name }}</h3>
    </div>
    <div class="objet">
        <h4><span style="text-decoration: underline;">Object : </span><em>{{"Lettre d’invitation pour le 4ème Congrès de la 
            SOCEDIAMN- 09 au 11 Novembre 2023-Hotel vallée des Princes Douala"}}</em></h4>
    </div>
    <div class="politesse">
       <p>Cher(e) <strong>{{ $titre." ".$nom }}</strong></p> 
    </div>
    <div class="droit">
        Nous vous invitons à participer au 4ème Congrès de la Société Camerounaise d’Endocrinologie, Diabétologie, Métabolisme et Nutrition (SOCEDIAMN) qui aura lieu du 09 au 11 novembre 2023 à l’hôtel vallée des princes à Douala.
        <br>
        <br>
        Il nous serait agréable de vous accueillir lors de notre congrès.
        <br>
        <br>
        Cette lettre peut servir pour les formalités administratives nécessaires à votre venue au congrès.
        <br>
        <br>
        Dans l’attente de vous recevoir, recevez l’expression de nos sincères salutations.
    </div>
    <div class="signature">
        <div class="signature-1">
            <h4 style="width: 70%;">
                Le Président du Comité <b/>
                Local d’organisation
            </h4>
            <br><br>
            <h4>
                Professeur Siméon CHOUKEM  
            </h4>
            <img src="img/prsimeon.png" alt="4ème congrès de la socediamn" style="width: 60%;" >
        </div>
    </div>
    <div class="signature2">
        <div class="signature-1">
            <h4>
                Le Président
            </h4>
            <br><br><br>
            <h4>
                Professeur MBANYA Jean Claude  
            </h4>
            <img src="img/prclaude.png" alt="4ème congrès de la socediamn" style="width: 60%;" >
        </div>
    </div>
    <div class="signature-3"></div>
    <div class="signature-4"></div>
</body>

</html>
