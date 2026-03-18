<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat poster</title>
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
            top: 43.5%;
            text-align: center;
            font-size: 2em;
            font-style: italic;
        }

        .titre {
            position: absolute;
            z-index: 1000;
            width: 100%;
            text-align: center;
            top: 61%;
            font-size: 1.6em;
            font-style: italic;

        }

        .titre-2 {
            position: absolute;
            z-index: 1000;
            width: 100%;
            text-align: center;
            top: 67.75%;
            font-size: 1.6em;
            font-style: italic;
        }

        .titre-3 {
            position: absolute;
            z-index: 1000;
            width: 95%;
            text-align: center;
            top: 61%;
            font-size: 1.6em;
            margin-left: 2.25%;
            font-style: italic;
            padding-left: 1.5%;

        }

        .titre-4 {
            position: absolute;
            z-index: 1000;
            width: 100%;
            text-align: center;
            top: 67.75%;
            font-size: 1.6em;
            margin-left: 2.25%;
            padding-left: 3%;
            font-style: italic;
        }

        .titre-5 {
            position: absolute;
            z-index: 1000;
            width: 100%;
            text-align: center;
            top: 63%;
            font-size: 1.1em;
            font-style: italic;

        }

        .titre-6 {
            position: absolute;
            z-index: 1000;
            width: 100%;
            text-align: center;
            top: 70%;
            font-size: 1.1em;
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
        $titre =  ucfirst(mb_strtolower($abstract->titre));
        $arrayTitre = explode(' ', $titre);

        $libelleTitre1 = '';
        $libelleTitre2 = '';
        $verifyLength1 = "";
       
    @endphp
    @foreach ($arrayTitre as $libelle)
        @php
            $verifyLength1 .= $libelle." ";
        @endphp
        @if (strlen($abstract->titre) <= 174)
            @if (strlen($verifyLength1) < 90)
                @php
                    $libelleTitre1 .= $libelle . ' ';
                @endphp

               
            @else
                @php
                    $libelleTitre2 .= $libelle . ' ';
                @endphp
            @endif
       
        @else
            @if (strlen($verifyLength1) < 135)
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
    <h2 class="name">{{ mb_strtoupper($abstract->name) }}</h2>
    @if (strlen($abstract->titre) <= 154)
        <h5 class="titre">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-2">{{ $libelleTitre2 }}</h5>
    @elseif(strlen($abstract->titre) >= 155 && strlen($abstract->titre) <= 178)
        <h5 class="titre-3">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-4">{{ $libelleTitre2 }}</h5>
    @else
        <h5 class="titre-5">{{ $libelleTitre1 }}</h5>
        <h5 class="titre-6">{{ $libelleTitre2 }}</h5>
    @endif
    {{--  <h3>{{ strlen($titre) }}</h3>  --}}
    <div class="bg-certificate">

        <img src="assets/images/attestation/best-Oral.svg" alt="" id="bg">
    </div>
</body>

</html>
