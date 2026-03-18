<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Badge</title>
    <style>
        .container div {
            width: 380px;
            height: 536px;

        }

        div #badge {
            position: absolute;
            z-index: 0;
            width: 380px;
            height: 536px;
        }



        .qr-code {
            position: absolute;
            width: 80px;
            height: 80px;
            z-index: 1000;

        }

        .qr-code img {
            width: 80px;
            height: 80px;
        }



        .Orateur {
            height: 20vh;
            background: rgba(16, 67, 16, 0.869);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2.1em;
            font-style: italic;
            font-weight: 200px !important;
            color: white;
            width:  70%;
            position: absolute;
            left: 15%;

        }

        .INFORMATICIEN{
            height: 25vh;
            background: rgb(5, 200, 243);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2.2em;
            font-style: italic;
            font-weight: 900 !important;
            color: white;
            width: 80%;
            position: absolute;
            left: 6%;
        }

        .SECRETARIAT {
            height: 25vh;
            background: rgb(5, 200, 243);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2.2em;
            font-style: italic;
            font-weight: 900 !important;
            color: white;
            width:  70%;
            position: absolute;
            left: 15%;
        }

        .GESTIONNAIRE-SALLE {
            height: 25vh;
            background: rgb(5, 200, 243);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2em;
            font-style: italic;
            font-weight: 900 !important;
            color: white;
            width:  90%;
            position: absolute;
            left: 3%;
        }

        .LOGISTIQUE {
            height: 25vh;
            background: rgb(5, 200, 243);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2.2em;
            font-style: italic;
            font-weight: 900 !important;
            color: white;
            width:  70%;
            position: absolute;
            left: 15%;
        }

        .SECURITE {
            height: 25vh;
            background: rgb(5, 200, 243);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2.2em;
            font-style: italic;
            font-weight: 900 !important;
            color: white;
            width:  70%;
            position: absolute;
            left: 15%;
        }

        .HOTESSE {
            height: 25vh;
            background: rgb(5, 200, 243);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2.2em;
            font-style: italic;
            font-weight: 900 !important;
            color: white;
            width:  70%;
            position: absolute;
            left: 15%;
        }

        .STEWARD {
            height: 25vh;
            background: rgb(5, 200, 243);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2.2em;
            font-style: italic;
            font-weight: 900 !important;
            color: white;
            width:  70%;
            position: absolute;
            left: 15%;
        }

        .MEDIA {
            height: 25vh;
            background: rgb(7, 19, 22);
            padding: 1px 0 7px 0;
            border-radius: 50%;
            border: 1px solid white;
            font-size: 2.2em;
            font-style: italic;
            font-weight: 900 !important;
            color: white;
            width:  70%;
            position: absolute;
            left: 15%;
        }



        div h1 {
            position: absolute;
            width: 95%;
            text-align: center;
            z-index: 1000;
            font-style: italic;
            font-weight: 900 !important;
        }

        div h2 {
            position: absolute;
            width: 95%;
            text-align: center;
            z-index: 1000;
            font-style: italic;
            font-weight: 600 !important;
        }

        div h3 {
            position: absolute;
            width: 95%;
            text-align: center;
            z-index: 1000;
        }

        div p {
            position: absolute;
            width: 95%;
            text-align: center;
            z-index: 1000;
            font-size: 1.2em;
        }

        .bg-1 {}
        div {
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
         $imageBadge = 'img/badges/badgehtaebolowa.png';
    @endphp
    <div class="container">
        @foreach ($data['participants'] as $participant)
            @php


                $pecialiste = $participant->service;

                $name = $participant->titre . ' ' . mb_strtoupper($participant->name);
                $nbreLettre = strlen($name);
                if($nbreLettre > 18){
                    $tabName = explode(' ', $name);

                    $name = $tabName[0]." ".$tabName[1];
                    if(strlen($name)>18){
                        $name = $tabName[0]." ".$tabName[1];
                    }else{

                    }
                }else{

                }

            @endphp
            @if ($i == 1)
                <div style="margin-top: {{ '-6%;' }} position: absolute; margin-left: {{ '-6.5%' }}"
                    class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" id="badge">

                    <h1 style="top: 50%;">{{ $name }}</h1>

                    <h3 style="top: 60%;" class="{{ $pecialiste }}">{{  $pecialiste }} </h3>

                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 2)
                <div style=" position: absolute; top: -4%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" id="badge">

                    <h1 style="top: 47%;">{{ $name }}</h1>

                    <h3 style="top: 56%;" class="{{ $pecialiste }}">{{  $pecialiste }} </h3>

                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 3)
                <div style="position: absolute; top: 50%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" id="badge">

                    <h1 style="top: 47%;">{{ $name }}</h1>

                    <h3 style="top: 56%;" class="{{ $pecialiste }}">{{  $pecialiste }} </h3>

                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 4)
                <div style="position: absolute; top: 50%;  left: {{ '-5.5%' }}" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" id="badge">

                    <h1 style="top: 47%;">{{ $name }}</h1>

                    <h3 style="top: 56%;" class="{{ $pecialiste }}">{{  $pecialiste }} </h3>

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
            @php
                 $delete = DB::table('comite_organisations')
                                ->where('id', $participant->id)
                                ->update([
                                    'badge'=>1
                                ]);


                $compteurDiv++;
            @endphp
        @endforeach
    </div>
</body>

</html>
