<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Badge</title>
    <style>
        /* .container div {
            width: 380px;
            height: 536px;

        }

        div #badge {
            position: absolute;
            z-index: 0;
            width: 370px;
            height: 521.8px;

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


        .badge-item {
            border: 4px solid rgba(44, 43, 43, 0.646);
        }

        .qr-code {
            position: absolute;
            width: 50px;
            height: 50px;
            z-index: 1000;

        }



        .qr-code img {}





        div h1 {
            position: absolute;
            width: 95%;
            text-align: center;
            z-index: 1000;
            font-style: italic;
            font-weight: 900 !important;
            color: whitesmoke;
            font-size: 1.5em;
        }

        div h2 {
            position: absolute;
            width: 100%;
            text-align: center;
            z-index: 1000;
            font-style: italic;
            font-weight: bolder !important;
            color: rgb(228, 95, 6);
            font-size: 2em;
            background-color: whitesmoke;
            height: 10vh;
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
    </style>
</head>

<body>
    @php
        /* $from = [255, 0, 255];
 $to = [0, 255, 255];*/
        // $liste = DB::table('badge_listes')->get();
        $i = 1;
        $compteurDiv = 0;
    @endphp
    <div class="container">
        @foreach ($data['badges'] as $participant)
            @php
                $imageBadge = 'assets/images/badges/badge.png';

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
                <div style="margin-top: {{ '-6%;' }} position: absolute; margin-left: {{ '-5%' }}"
                    class="{{ $i }}">

                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">

                    <h1 style="top: 59%;">{{ $name }}</h1>
                    <h2 style="top: 77%; font-weight: bolder;">{{ $participant->service }}</h2>
                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 2)
                <div style=" position: absolute; top: -4%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">

                    <h1 style="top: 55.75%;">{{ $name }}</h1>
                    <h2 style="top: 73.5%; font-weight: bolder;">{{ $participant->service }}</h2>
                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 3)
                <div style="position: absolute; top: 50%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">

                    <h1 style="top: 55.75%;">{{ $name }}</h1>
                    <h2 style="top: 73.5%; font-weight: bolder;">{{ $participant->service }}</h2>
                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 4)
                <div style="position: absolute; top: 50%;  left: {{ '-5%' }}" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">

                    <h1 style="top: 55.75%;">{{ $name }}</h1>
                    <h2 style="top: 73.5%; font-weight: bolder;">{{ $participant->service }}</h2>

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
                $update = DB::table('comite_organisations')
                    ->where('id', $participant->id)
                    ->update([
                        'badge' => 1,
                    ]);
                $compteurDiv++;
            @endphp
        @endforeach
    </div>
</body>

</html>
