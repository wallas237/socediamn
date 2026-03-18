<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Badge</title>
    <style>
        /*.container div {
            width: 397px;
            height: 560px;

        }

        div #badge {
            position: absolute;
            z-index: 0;
            width: 380px;
            height: 536px;
        }*/

        .container div {
            /*width: 397px;
            height: 560px;*/
            width: 385px;
            height: 543px;

        }

        div #badge {
            position: absolute;
            z-index: 0;
            /*width: 380px;
            height: 536px;*/
            z-index: 0;
            width: 375px;
            height: 528.8px;
        }



        .qr-code {
            position: absolute;
            width: 20px;
            height: 20px;
            z-index: 1000;

        }







        div h1 {
            position: absolute;
            width: 85%;
            text-align: center;
            z-index: 1000;
            /* font-style: italic; */
            font-weight: bolder !important;
            color: rgb(22, 2, 2);
            font-size: 1.7em;
            left: 13%;

        }

        div h2 {
            position: absolute;
             width: 85%;
            text-align: center;
            z-index: 1000;
            font-style: italic;
            font-weight: bold !important;
            color: #782017 !important;
            left: 13%;
        }

        div h3 {
            position: absolute;
            width: 95%;
            text-align: center;
            z-index: 1000;
        }

        div p {
            position: absolute;
             width: 85%;
            text-align: center;
            z-index: 1000;
            font-size: 1.2em;
            left: 13%;
        }

        .bg-1 {}

        .badge-item {
            border: 4px solid rgba(44, 43, 43, 0.646);

        }
    </style>
</head>

<body>
    @php
        /* $from = [255, 0, 255];
 $to = [0, 255, 255];*/
        // $liste = DB::table('badge_listes')->get();
        $i = 1;
        $compteurDiv = 0;
        $imageBadge = 'assets/images/badges/afa-badge.png';
    @endphp
    <div class="container">
        @foreach ($participants as $participant)
            @php

                $verifierSiConférencier = $participant->qualite;
                $mot = 'Conférencier';
                $ville = $participant->pays;
                $libelle = 'PARTICIPANT';
                if (str_contains($verifierSiConférencier, $mot)) {
                    $libelle = 'CONFERENCIER';
                }

                $name = $participant->titre . ' ' . mb_strtoupper($participant->name);
                $nbreLettre = strlen($name);
                if ($nbreLettre > 18) {
                    $tabName = explode(' ', $name);
                    $prenom = explode(' ', $participant->prenom);
                    $name = $tabName[0] . ' ' . $tabName[1] . ' ' . $prenom[0];
                    if (strlen($name) > 18) {
                        $name = $tabName[0] . ' ' . $tabName[1] . ' ' . $prenom[0][0] . '.';
                    } else {
                    }
                } else {
                    $prenom = explode(' ', $participant->prenom);
                    $long = $name . ' ' . ucfirst($prenom[0]);
                    $nbreLettre2 = strlen($long);
                    if ($nbreLettre2 < 18) {
                        $name = $long;
                    } else {
                        $name = $name . ' ' . ucfirst($participant->prenom[0]) . '.';
                    }
                }
                // $ville = mb_strtoupper($ville);*/
            @endphp
            @if ($i == 1)
                <div style="margin-top: {{ '-6%;' }} position: absolute; margin-left: {{ '-5.5%' }}"
                    class="{{ $i }}">

                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 57%;">{{ $name }}</h1>
                    <p style="top: 66%; font-size: 1.5em; color: #3a83c7;  font-weight:  500;">{{ $libelle }}</p>
                    <h2 style="top: 75%;">{{ $ville }}</h2>
                    {{-- <h2 style="top: 79%; position: absolute; font-weight: bolder; color:aliceblue; font-size: 1.7em;" >{{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 43%; left: 3%;">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 2)
                <div style=" position: absolute; top: -4%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 53.75%;">{{ $name }}</h1>
                    <p style="top: 63%; font-size: 1.5em; color: #3a83c7;  font-weight:  500;">{{ $libelle }}</p>
                    <h2 style="top: 72%;">{{ $ville }}</h2>
                    {{-- <h2 style="top: 75.5%; position: absolute; font-weight: bolder; color:aliceblue; font-size: 1.7em;" >{{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 40%; left: 3%;">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 3)
                <div style="position: absolute; top: 50%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 53.75%;">{{ $name }}</h1>
                    <p style="top: 63%; font-size: 1.5em; color: #3a83c7;  font-weight:  500;">{{ $libelle }}</p>
                    <h2 style="top: 72%;">{{ $ville }}</h2>
                    {{-- <h2 style="top: 75.5%; position: absolute; font-weight: bolder; color:aliceblue; font-size: 1.7em;" >{{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 40%; left: 3%;">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 4)
                <div style="position: absolute; top: 50%;  left: {{ '-5.5%' }}" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 53.75%;">{{ $name }}</h1>
                    <p style="top: 63%; font-size: 1.5em; color: #3a83c7;  font-weight:  500;">{{ $libelle }}</p>
                    <h2 style="top: 72%;">{{ $ville }}</h2>
                    {{-- <h2 style="top: 75.5%; position: absolute; font-weight: bolder; color:aliceblue; font-size: 1.7em;" >{{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 40%; left: 3%;">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                    {{--  <p style="top: 45%;">{{ $grade }}</p>  --}}
                    {{--  <h2 style="top: 49%;">{{ $ville }}</h2>  --}}
                    {{--  <h3 style="top: 53%;" class={{ $pecialiste }}>{{ $pecialiste }} </h3>  --}}

                </div>

                @php
                    $i = 0;
                @endphp
            @endif

            @if ($compteurDiv == 4)
                @php
                    $compteDiv = 0;
                @endphp
            @endif

        @endforeach
    </div>
</body>

</html>
