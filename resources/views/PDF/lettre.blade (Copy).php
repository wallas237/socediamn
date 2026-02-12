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

        .gauche img {
            width: 110%;
        }

        .separateur {
            position: absolute;
            left: 30%;
        }


        .date-jour {
            position: absolute;
            right: 20%;
            top: 15%;
        }

        .destinataire {
            position: absolute;
            right: 10%;
            top: 30%;
        }

        .objet {
            width: 55%;
            margin-left: 33%;
            position: absolute;
            top: 40%;
            padding-right: 10%;
        }

        .politesse {
            position: absolute;
            margin-left: 33%;
            top: 48%;
        }

        .droit {
            position: absolute;
            margin-left: 33%;
            top: 50%;
            padding-right: 8%;
            line-height: 25px;
        }

        .signature {
            position: absolute;
            top: 80%;
            left: 32%;
            width: 40%;
        }

        .signature2 {
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
        <h4>Douala, <span> </span><span>{{ date('d') }} </span> <span>
                @if (date('m') == '09')
                    {{ 'September' }}
                @elseif(date('m') == '10')
                    {{ 'October' }}
                @else
                @endif
            </span> <span>{{ date('Y') }} </span></h4>
    </div>
    <div class="destinataire">
        <h3>To {{ $name }}</h3>
    </div>
    <div class="objet">
        <h4><span style="text-decoration: underline;">Object :
            </span><em>{{ 'Invitation letter for the 4 th SOCEDIAMN Congress - 9 to 11 November 2023 - Hotel Vallée des princes Douala' }}</em>
        </h4>
    </div>
    <div class="politesse">
        <p>Dear <strong>{{ $titre . ' ' . $nom }}</strong></p>
    </div>
    <div class="droit">
        We are inviting you to participate at the 4 th Cameroonian Society of endocrinology , Diabetology Métabolism and
        Nutrition Congress ( SOCEDIAMN) which will take place on the 9 to 11th November 2023 at the Hotel Vallée des
        princes in Douala.
        <br>
        <br>
        It will be our pleasure to welcome you during this Congress.
        <br>
        <br>
        This letter Can serve for administrative formalities necessary for our observation at the Congress.
        <br><br>
        Looking forward to receiving you , receive expression of our sincere salutations.
    </div>
    <div class="signature">
        <div class="signature-1">
            <h4 style="width: 70%;">
                Chairman of the local <b/> organizing committee 
               
            </h4>
            <br><br>
            <h4>
                Professor Simeon CHOUKEM
            </h4>
            <img src="img/prsimeon.png" alt="4ème congrès de la socediamn" style="width: 60%;">
        </div>
    </div>
    <div class="signature2">
        <div class="signature-1">
            <h4>
                The President
            </h4>
            <br><br><br>
            <h4>
                Professor MBANYA Jean Claude
            </h4>
            <img src="img/prclaude.png" alt="4ème congrès de la socediamn" style="width: 60%;">
        </div>
    </div>

</body>

</html>
