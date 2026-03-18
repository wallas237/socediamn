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
            height: 560px;

            */
            width: 380px;
            height: 545px;

        }

        div #badge {
            position: absolute;
            z-index: 0;
            /*width: 380px;
            height: 536px;*/
            z-index: 0;
            width: 380px;
            height: 545px;
        }




        .qr-code {
            position: absolute;
            width: 30px !important;
            height: 30px !important;
            z-index: 1000;

        }







        div h1 {
            position: absolute;
            width: 100%;
            text-align: center;
            z-index: 1000;
            /* font-style: italic; */
            font-weight: bolder !important;
            color: rgba(0, 0, 0, 0.815) !important;
            font-size: 1.95em;
        }

        div h2 {
            position: absolute;
            width: 95%;
            text-align: center;
            z-index: 1000;
            font-style: italic;
            font-weight: bold !important;
            color: gray !important;
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

        .badge-item {
            border: 4px solid rgba(44, 43, 43, 0.646);

        }

        .ville {
            color: rgba(14, 199, 14, 0.726) !important;
        }

        .libelle {
            color: rgba(0, 0, 0, 0.815) !important;
            font-size: 1.5em;
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
        $imageBadge = 'assets/images/badges/hackathon.png';
    @endphp
    <div class="container">
        @foreach ($data['participants'] as $participant)
            @php
                $name = "";
                $libelle = mb_strtoupper($participant->categorie);
                if (strlen($participant->nom) > 5) {


                    $allName = mb_strtoupper(trim($participant->nom));

                    $tabName = explode(' ', $allName);
                    $countName = count($tabName);
                    $lastindex = $countName - 1;
                    $name = $tabName[0] . ' ' . $tabName[$lastindex];
                }

                // $ville = mb_strtoupper($ville);*/

            @endphp
            @if ($i == 1)
                <div style="margin-top: {{ '-6%;' }} position: absolute; margin-left: {{ '-5.5%' }}"
                    class="{{ $i }}">

                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">

                    <h1 style="top: 62%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}

                    <h2 style="top: 77%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2>

                </div>

                @php
                    $i++;
                @endphp
            @elseif($i == 2)
                <div style=" position: absolute; top: -4%; right: -4.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">

                    <h1 style="top: 59%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}

                    <h2 style="top: 74%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2>

                </div>



                @php
                    $i++;
                @endphp
            @elseif($i == 3)
                <div style="position: absolute; top: 50%;  left: {{ '-5.5%' }}" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php

                    @endphp
                    <h1 style="top: 59%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}

                    <h2 style="top: 74%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2>



                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 4)
                <div style="position: absolute; top: 50%; right: -4.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php

                    @endphp
                    <h1 style="top: 59%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}

                    <h2 style="top: 74%; position: absolute; font-weight: bolder; font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2>

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
                $delete = DB::table('participants')
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
