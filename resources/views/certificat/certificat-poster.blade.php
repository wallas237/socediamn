<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat communication affichée</title>
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
            top: 32%;
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
            font-size: 1.2em;
            font-style: italic;
            padding-right: 1.5%;

        }

        .titre-2 {
            position: absolute;
            z-index: 1000;
            width: 94.5%;
            text-align: center;
            top: 46.5%;
            font-size: 1.7em;
            margin-left: 1.5%;
            padding-left: 0.5%;
            font-style: italic;

        }



        .titre-3 {
            position: absolute;
            z-index: 1000;
            width: 94.5%;
            text-align: center;
            top: 43.25%;
            font-size: 1.6em;
            font-style: italic;
            padding-left: 0.1%;
            margin-left: 1.5%;

        }

        .titre-4 {
            position: absolute;
            z-index: 1000;
            width: 93%;
            text-align: left;
            top: 50.5%;
            font-size: 1.6em;
            margin-left: 1%;
            padding-left: 1%;
            font-style: italic;

        }

        .titre-5 {
            position: absolute;
            z-index: 1000;
            width: 94.5%;
            text-align: center;
            top: 44%;
            font-size: 1.5em;
            font-style: italic;
            padding-left: 0.1%;
            margin-left: 1.5%;


        }

        .titre-6 {
            position: absolute;
            z-index: 1000;
            width: 93%;
            text-align: left;
            top: 51.2%;
            font-size: 1.5em;
            margin-left: 1%;
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

        .titre-9 {
            position: absolute;
            z-index: 1000;
            width: 94.5%;
            text-align: center;
            top: 45.2%;
            font-size: 1.3em;
            font-style: italic;
            padding-left: 0.1%;
            margin-left: 1.5%;


        }

        .titre-10 {
            position: absolute;
            z-index: 1000;
            width: 93%;
            text-align: left;
            top: 52.5%;
            font-size: 1.3em;
            margin-left: 1%;
            padding-left: 1%;
            font-style: italic;
        }

         .titre-11 {
            position: absolute;
            z-index: 1000;
            width: 94.5%;
            text-align: center;
            top: 45.80%;
            font-size: 1.2em;
            font-style: italic;
            padding-left: 0.1%;
            margin-left: 1.5%;


        }

        .titre-12 {
            position: absolute;
            z-index: 1000;
            width: 93%;
            text-align: left;
            top: 53.25%;
            font-size: 1.2em;
            margin-left: 1%;
            padding-left: 1%;
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
        $titre = ucfirst(mb_strtolower($com->titre));
        $arrayTitre = explode(' ', $titre);

        $libelleTitre1 = '';
        $libelleTitre2 = '';
        $verifyLength1 = '';

    @endphp



    @foreach ($arrayTitre as $libelle)
        @php
            $verifyLength1 .= $libelle . ' ';
        @endphp
        @if (strlen($com->titre) <= 88)
            @if (strlen($verifyLength1) <= 88)
                @php
                    $libelleTitre1 .= $libelle . ' ';
                @endphp
            @endif
        @elseif(strlen($com->titre) >= 89 && strlen($com->titre) <= 178)
            @if (strlen($verifyLength1) <= 88)
                @php
                    $libelleTitre1 .= $libelle . ' ';
                @endphp
            @else
                @php
                    $libelleTitre2 .= $libelle . ' ';
                @endphp
            @endif
        @elseif(strlen($com->titre) >= 95 && strlen($com->titre) <= 191)
            @if (strlen($verifyLength1) <= 95)
                @php
                    $libelleTitre1 .= $libelle . ' ';
                @endphp
            @else
                @php
                    $libelleTitre2 .= $libelle . ' ';
                @endphp
            @endif
        @elseif(strlen($com->titre) >= 192 && strlen($com->titre) <= 211)
            @if (strlen($verifyLength1) <= 105)
                @php
                    $libelleTitre1 .= $libelle . ' ';
                @endphp
            @else
                @php
                    $libelleTitre2 .= $libelle . ' ';
                @endphp
            @endif
        @elseif(strlen($com->titre) >= 212 && strlen($com->titre) <= 235)
            @if (strlen($verifyLength1) <= 125)
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
    <h2 class="name">
        {{ $name }}
    </h2>
    @if (strlen($com->titre) <= 88)
        <h5 class="titre-2">{{ $libelleTitre1 }}</h5>
    @elseif(strlen($com->titre) >= 89 && strlen($com->titre) <= 176)
        <h5 class="titre-3">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-4">{{ $libelleTitre2 }}</h5>
    @elseif(strlen($com->titre) >= 177 && strlen($com->titre) <= 191)
        <h5 class="titre-5">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-6">{{ $libelleTitre2 }}</h5>
    @elseif(strlen($com->titre) >= 192 && strlen($com->titre) <= 211)
        <h5 class="titre-9">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-10">{{ $libelleTitre2 }}</h5>
    @elseif(strlen($com->titre) >= 212 && strlen($com->titre) <= 235)
        <h5 class="titre-11">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-12">{{ $libelleTitre2 }}</h5>
    @elseif(strlen($com->titre) >= 236 && strlen($com->titre) <= 361)
        <h5 class="titre-7">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-8">{{ $libelleTitre2 }}</h5>
    @else
    @endif

    <div class="bg-certificate">
        @if (strlen($com->titre) <= 88)
            <img src="assets/images/attestation/congres/communication-affichee-min.png" alt="" id="bg">
        @else
            <img src="assets/images/attestation/congres/communication-affichee-max.png" alt="" id="bg">
        @endif
    </div>
</body>

</html>
