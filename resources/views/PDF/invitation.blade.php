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
            position: absolute;
            padding-left: 3%;
            padding-top: 1%;

        }

        .entete img {
           width: 13%;
           position: absolute;
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
           /*  margin-left: 20px;*/
            margin-top: 7%; 
           
            text-align: center;
            position: absolute;
            padding-left: 1%;
           
        }

        .gauche img {
            
            
            position: absolute;
            top: 7%;
            width: 250%;
        }

        .separateur {
            position: absolute;
            left: 30%;
            top: 13.5%;
             height: 100%;
             
        }

        .separateur img{
           
            
            height: 85%;
           
            
        }
        
        .date-jour {
            position: absolute;
            right: 20%;
            top: 15%;
        }

        .destinataire {
            position: absolute;
            right: 10%;
            top: 20%;
        }

        .objet {
            width: 55%;
            margin-left: 33%;
            position: absolute;
            top: 25%;
            padding-right: 10%;
        }

        .politesse {
            position: absolute;
            margin-left: 33%;
            top: 32%;
        }

        .droit {
            position: absolute;
            margin-left: 33%;
            top: 35%;
            padding-right: 8%;
            /* line-height: 25px; */
        }

        .signature {
            position: absolute;
            top: 80%;
            left: 40%;
            width: 40%;
        }

        .signature-3 {
            position: absolute;
            top: 85%;
            left: 50%;
            width: 40%;
        }

        .signature2 {
            position: absolute;
            top: 90%;
            left: 65%;
            width: 40%;
        }
    </style>
</head>

<body>
    <div class="entete">
        <div class="img">
            <img src="img/socediamn.png" alt="5ème congrès de la socediamn">
        </div>
        <div class="h">
            <h4>Société Camerounaise d’Endocrinologie, Diabétologie, Métabolisme et Nutrition</h4>
            <h4> Cameroon Society of Endocrinology, Diabetology, Metabolism and Nutrition</h4>
        </div>
    </div>
    <div class="gauche">
        <img src="img/socediamnlettre.PNG" alt="5ème congrès de la socediamn & 8ème congrès de la sfade ">

    </div>
    <div class="separateur">
        <img src="img/separateursocediamn.png" alt="5ème congrès de la socediamn & 8ème congrès de la sfade">
    </div>
    <div class="date-jour">
        <h4>Yaoundé, <span> le </span>
            <span>
                {{ date('d') }}

            </span>
            <span>
                @if (date('m') == '03')
                    {{ 'Mars' }}
                @elseif(date('m') == '04')
                    {{ 'Avril' }}
                @elseif(date('m') == '10')
                    {{ 'Octobre' }}
                @else
                @endif
            </span> <span>{{ date('Y') }} </span>
        </h4>
    </div>

    <div class="objet">
        <h4><span style="text-decoration: underline;">Object :
            </span><em>{{ 'Lettre d’invitation pour le congrès de la SOCEDIAMN- du 16 au 18 avril 2026' }}</em>
        </h4>
    </div>
    <div class="politesse">
        @php
            $civilite = '';
        @endphp
        @if ($titre == 'Pr')
            @php
                $civilite = 'Cher(e) Professeur';
            @endphp
        @elseif($titre == 'Dr')
            @php
                $civilite = 'Cher(e) Docteur';
            @endphp
        @elseif($titre == 'Mme')
            @php
                $civilite = 'Chère Madame';
            @endphp
        @elseif($titre == 'M')
            @php
                $civilite = 'Cher Monsieur';
            @endphp
        @elseif($titre == 'Mlle')
            @php
                $civilite = 'Chère Mademoiselle';
            @endphp
        @elseif($titre == 'M.')
            @php
                $civilite = 'Cher Monsieur';
            @endphp
        @else
            @php
                $civilite = 'Cher(e) ' . $titre;
            @endphp
        @endif
        <p><strong>{{ $civilite }} {{ $nom }}</strong></p>
    </div>
     <img src="img/socediamn.png" alt="5ème congrès de la socediamn" id="filligrane" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.1; width: 60%;">
    <div class="droit">
        Au nom du Comité d’organisation, nous avons l’honneur de vous inviter à participer
        au Congrès de la Société Camerounaise d’Endocrinologie, Diabétologie, Maladies Métaboliques
        et Nutrition (SOCEDIAMN), qui se tiendra du 16 au 18 avril 2026 à la Faculté de Médecine
        et des Sciences Biomédicales de l’Université de Yaoundé I, à Yaoundé (Cameroun).
        <br>
        <br>
        Ce congrès réunira des spécialistes nationaux et internationaux autour des avancées
        récentes dans les domaines de l’endocrinologie, de la diabétologie,
        des maladies métaboliques et de la nutrition.
        <br>
        <br>
        Il nous serait particulièrement agréable de vous compter parmi les participants
        et de vous accueillir en tant que représentant(e) de votre pays à cette rencontre scientifique.
        <br>
        <br>
        Dans l’attente du plaisir de vous recevoir, nous vous prions d’agréer, {{ $civilite }}, l’expression de nos salutations distinguées.
    </div>
    <div class="signature">
        <div class="signature-1">
            <h4 style="width: 70%;">
                Pour Le Secrétariat Général <b />
              
            </h4>
            
            <h4>
                Professeur ETOA Martine Epse ETOGA
            </h4>
            <img src="img/signatureEtoa.png" alt="5ème congrès de la socediamn & 8ème congrès de sdafe" style="width: 30%;">
        </div>
    </div>
    
    <div class="signature-3">
         <img src="img/cachet_socediamn.png" alt="5ème congrès de la socediamn & 8ème congrès de sdafe" style="width: 30%;">

    </div>
    
</body>

</html>
