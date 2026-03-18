<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat communication orale</title>
    <style>
        body {
            margin: 0px 0px;
            padding: 0px 0px;


        }

        .bg-certificate {
            height: 100%;
            height: 100vh;
            margin: 0px 0px;
            padding: 0px 0px;
            position: absolute;
            z-index: 0;
        }

        .bg-certificate img {
            margin-left: -4.5%;
            margin-top: -4.5%;
            width: 109%;

        }

        .name {
            position: absolute;
            z-index: 1000;
            width: 100%;
            top: 33%;
            text-align: center;
            font-size: 2.2em;
            font-style: italic;
        }

        .titre {
            position: absolute;
            z-index: 1000;
            width: 47%;
            text-align: right;
            top: 43%;
            margin-left: 38%;
            font-size: 1.7em;
            font-style: italic;
            padding-right: 1.5%;

        }

        .titre-2 {
            position: absolute;
            z-index: 1000;
            width: 94.5%;
            text-align: center;
            top: 45%;
            font-size: 1.7em;
            margin-left: 1.5%;
            padding-left: 0.5%;
            font-style: italic;

        }

        .titre-en {
            position: absolute;
            z-index: 1000;
            width: 60%;
            text-align: left;
            top: 53.25%;
            margin-left: 33%;
            font-size: 1.2em;

        }

        .titre-2-en {
            position: absolute;
            z-index: 1000;
            width: 78%;
            text-align: left;
            top: 58%;
            font-size: 1.2em;
            margin-left: 9%;
            padding-left: 0.5%;
            font-style: italic;



        }

        .titre-3 {
            position: absolute;
            z-index: 1000;
            width: 94.5%;
            text-align: center;
            top: 45.6%;
            font-size: 1.2em;
            font-style: italic;
            padding-left: 0.5%;

            margin-left: 1.5%;

        }

        .titre-4 {
            position: absolute;
            z-index: 1000;
            width: 93%;
            text-align: left;
            top: 53.60%;
            font-size: 1.1em;
            margin-left: 1%;
            padding-left: 1%;
            font-style: italic;

        }

        .titre-3-en {
            position: absolute;
            z-index: 1000;
            width: 60%;
            text-align: left;
            top: 54%;
            font-size: 1.1em;
            margin-left: 33%;
            font-style: italic;
            padding-left: 2%;

        }

        .titre-4-en {
            position: absolute;
            z-index: 1000;
            width: 78%;
            text-align: left;
            top: 59%;
            font-size: 1.1em;
            margin-left: 9%;
            padding-left: 3%;
            font-style: italic;
        }

        .titre-5 {
            position: absolute;
            z-index: 1000;
            width: 47%;
            text-align: right;
            top: 43.5%;
            font-size: 0.9em;
            margin-left: 38%;
            font-style: italic;
            padding-left: 3%;
            padding-right: 1.5%;


        }

        .titre-6 {
            position: absolute;
            z-index: 1000;
            width: 93%;
            text-align: left;
            top: 49%;
            font-size: 0.9em;
            margin-left: 1.5%;
            padding-left: 1%;
            font-style: italic;
        }

        .titre-7 {
            position: absolute;
            z-index: 1000;
            width: 93%;
            text-align: center;
             top: 46.5%;
            font-size: 1.1em;
            margin-left: 1.5%;
            font-style: italic;
            padding-left: 3%;

            padding-right: 1.5%;
        }

        .titre-8 {
            position: absolute;
            z-index: 1000;
            width: 93%;
            text-align: left;
            top: 51%;
            font-size: 1.1em;
            margin-left: 1.5%;
            padding-left: 1%;
            font-style: italic;
        }

        .titre-5-en {
            position: absolute;
            z-index: 1000;
            width: 63%;
            text-align: left;
            top: 55.5%;
            font-size: 0.9em;
            margin-left: 32%;
            font-style: italic;
            padding-left: 1%;

        }

        .titre-6-en {
            position: absolute;
            z-index: 1000;
            width: 78%;
            text-align: left;
            top: 58%;
            font-size: 0.9em;
            margin-left: 9%;
            padding-left: 3%;
            font-style: italic;
        }

        h3 {
            position: absolute;
            z-index: 1000;
        }
    </style>
</head>

<body>
    @php
        $titre = ucfirst(mb_strtolower($com['titre']));
        $arrayTitre = explode(' ', $titre);

        $libelleTitre1 = '';
        $libelleTitre2 = '';
        $verifyLength1 = '';

        $libelleTitre1En = '';
        $libelleTitre2En = '';
        $verifyLength1En = '';

    @endphp
    @foreach ($arrayTitre as $libelle)
        @php
            $verifyLength1En .= $libelle . ' ';
        @endphp
        @if (strlen($com['titre']) <= 160)
            @if (strlen($verifyLength1En) <= 80)
                @php
                    $libelleTitre1En .= $libelle . ' ';
                @endphp
            @else
                @php
                    $libelleTitre2En .= $libelle . ' ';
                @endphp
            @endif
        @elseif(strlen($com['titre']) >= 160 && strlen($com['titre']) <= 180)
            @if (strlen($verifyLength1En) <= 85)
                @php
                    $libelleTitre1En .= $libelle . ' ';
                @endphp
            @else
                @php
                    $libelleTitre2En .= $libelle . ' ';
                @endphp
            @endif
        @else
            @if (strlen($verifyLength1En) < 120)
                @php
                    $libelleTitre1En .= $libelle . ' ';
                @endphp
            @else
                @php
                    $libelleTitre2En .= $libelle . ' ';
                @endphp
            @endif
        @endif
        @php
            $verifyLength1 .= $libelle . ' ';
        @endphp
        @if (strlen($com['titre']) <= 120)
            @if (strlen($verifyLength1) <= 120)
                @php
                    $libelleTitre1 .= $libelle . ' ';
                @endphp
            @endif
        @elseif(strlen($com['titre']) >= 121 && strlen($com['titre']) <= 240)
            @if (strlen($verifyLength1) <= 120)
                @php
                    $libelleTitre1 .= $libelle . ' ';
                @endphp
            @else
                @php
                    $libelleTitre2 .= $libelle . ' ';
                @endphp
            @endif
        @else
            @if (strlen($verifyLength1) < 130)
                @php
                    $libelleTitre1 .= $libelle . ' ';
                @endphp
            @else
                @php
                    $libelleTitre2 .= $libelle . ' ';
                @endphp
            @endif
        @endif
    @endforeach
    <h2 class="name">{{ $name }}
    </h2>
    @if (strlen($com['titre']) <= 120)
        {{-- <h5 class="titre">{{ $libelleTitre1 }}</h5> --}}
        <h5 class="titre-2">{{ $libelleTitre1 }}</h5>
        {{--  <h5 class="titre-en">{{ $libelleTitre1En }}</h5>
        <h5 class="titre-2-en">{{ $libelleTitre2En }}</h5>  --}}
    @elseif(strlen($com['titre']) >= 121 && strlen($com['titre']) <= 240)
        <h5 class="titre-3">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-4">{{ $libelleTitre2 }}</h5>
        {{--  <h5 class="titre-3-en">{{ $libelleTitre1En }}</h5>
        <h5 class="titre-4-en">{{ $libelleTitre2En }}</h5>  --}}
    @elseif(strlen($com['titre']) >= 241 && strlen($com['titre']) <= 361)
        <h5 class="titre-7">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-8">{{ $libelleTitre2 }}</h5>
        {{--  <h5 class="titre-3-en">{{ $libelleTitre1En }}</h5>
        <h5 class="titre-4-en">{{ $libelleTitre2En }}</h5>  --}}
    @else
        <h5 class="titre-5">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-6">{{ $libelleTitre2 }}</h5>
        {{--  <h5 class="titre-5-en">{{ $libelleTitre1En }}</h5>
        <h5 class="titre-6-en">{{ $libelleTitre2En }}</h5>  --}}
    @endif
    {{--  <h3>{{ strlen('The right ventricle in patients with obstructive sleep apnea syndrome in yaoundé,') }}</h3>  --}}
    <div class="bg-certificate">
 <img src="assets/images/attestation/attestation-communications-afa.png" alt="" id="bg">
    </div>
</body>

</html>

