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
            width: 385px;
            height: 545px;

        }

        div #badge {
            position: absolute;
            z-index: 0;
            /*width: 380px;
            height: 536px;*/
            z-index: 0;
            width: 385px;
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
            width: 95%;
            text-align: center;
            z-index: 1000;
            /* font-style: italic; */
            font-weight: bolder !important;
            color: rgba(0, 0, 0, 0.815);
            font-size: 1.7em;
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
            border-bottom: 2px solid rgba(44, 43, 43, 0.646);

        }

        .ville {
            color: #0c1c48 !important;
            font-size: 2em;
        }

        .libelle {
            color: rgba(0, 0, 0, 0.815) !important;
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
        $imageBadge = 'img/congressiste.png';
    @endphp
    <div class="container">
        @foreach ($data['participants'] as $participant)
            @php

                $verifierSiOrateur = DB::table('com_orale_valides')
                    ->where('email', trim($participant->email))
                    ->first();
                if(!empty($verifierSiOrateur)){
                    $imageBadge = 'img/speaker.png';
                }

                if($participant->specialite == 9){
                    $imageBadge = 'img/speaker.png';
                }
                // $grades = DB::table('grades')->where('id', $participant->grade)->first();
                // $grade = !empty($grades) ? $grades->titre : 'VISITEUR';
                // $libelle = 'PARTICIPANT';
                $ville = $participant->pays;

                // if ($participant->specialite == 9) {
                //     $libelle = 'CONFERENCIER';
                // } elseif (!empty($verifierSiOrateur)) {
                //     $verifierConference = DB::table('abstracts')
                //         ->where('email', trim($participant->email))
                //         ->where('type_abstract', 'Conférence')
                //         ->where('confirmation_abstract', 1)
                //         ->first();
                //     if ($verifierConference) {
                //         $libelle = 'CONFERENCIER';
                //     } else {
                //         $verifierOrale = DB::table('com_orale_valides')
                //             ->where('email', trim($participant->email))
                //             ->first();
                //         if (!empty($verifierOrale)) {
                //             $libelle = 'ORATEUR';
                //         }
                //     }
                // }

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
                    <h1 style="top: 53%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}
                    <h2 style="top: 60%;" class="ville">{{ $ville }}</h2>
                    {{-- <h2 style="top: 77%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 84%; right: 50%; border: 1px solid rgb(6, 6, 59);">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                </div>
                <div style=" position: absolute; top: -4%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 49.5%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}
                    <h2 style="top: 56%;" class="ville">{{ $ville }}</h2>
                    {{-- <h2 style="top: 74%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 80%; right: 50%; border: 1px solid rgb(6, 6, 59);">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @elseif($i == 2)
                <div style="position: absolute; top: 50%;  left: {{ '-5.5%' }}" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 50%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}
                    <h2 style="top: 56%;" class="ville">{{ $ville }}</h2>
                    {{-- <h2 style="top: 74%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 80%; right: 50%; border: 1px solid rgb(6, 6, 59);">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                    {{--  <p style="top: 45%;">{{ $grade }}</p>  --}}
                    {{--  <h2 style="top: 49%;">{{ $ville }}</h2>  --}}
                    {{--  <h3 style="top: 53%;" class={{ $pecialiste }}>{{ $pecialiste }} </h3>  --}}

                </div>
                <div style="position: absolute; top: 50%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 50%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}
                    <h2 style="top: 56%;" class="ville">{{ $ville }}</h2>
                    {{-- <h2 style="top: 74%; position: absolute; font-weight: bolder; font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 80%; right: 50%; border: 1px solid rgb(6, 6, 59);">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                </div>

                @php
                    $i++;
                @endphp
            @elseif($i == 3)
                 <div style="margin-top: {{ '-6%;' }} position: absolute; margin-left: {{ '-5.5%' }}"
                    class="{{ $i }}">

                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 53%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}
                    <h2 style="top: 60%;" class="ville">{{ $ville }}</h2>
                    {{-- <h2 style="top: 77%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 84%; right: 50%; border: 1px solid rgb(6, 6, 59);">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                </div>
                <div style=" position: absolute; top: -4%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 49.5%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}
                    <h2 style="top: 56%;" class="ville">{{ $ville }}</h2>
                    {{-- <h2 style="top: 74%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 80%; right: 50%; border: 1px solid rgb(6, 6, 59);">
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
                    <h1 style="top: 50%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}
                    <h2 style="top: 56%;" class="ville">{{ $ville }}</h2>
                    {{-- <h2 style="top: 74%; position: absolute; font-weight: bolder;  font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 80%; right: 50%; border: 1px solid rgb(6, 6, 59);">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
                    {{--  <p style="top: 45%;">{{ $grade }}</p>  --}}
                    {{--  <h2 style="top: 49%;">{{ $ville }}</h2>  --}}
                    {{--  <h3 style="top: 53%;" class={{ $pecialiste }}>{{ $pecialiste }} </h3>  --}}

                </div>
                <div style="position: absolute; top: 50%; right: -5.5%;" class="{{ $i }}">
                    <img src="{{ $imageBadge }}" alt="" class="badge-item" id="badge">
                    @php
                        $lienImage = 'qrcode/' . $participant->id . '_pa.svg';

                    @endphp
                    <h1 style="top: 50%;">{{ $name }}</h1>
                    {{-- <p style="top: 63%; font-size: 1.5em; color: whitesmoke;">{{ $grade }}</p> --}}
                    <h2 style="top: 56%;" class="ville">{{ $ville }}</h2>
                    {{-- <h2 style="top: 74%; position: absolute; font-weight: bolder; font-size: 1.7em;" class="libelle">
                        {{ $libelle }} </h2> --}}
                    <div class="qr-code" style="top: 80%; right: 50%; border: 1px solid rgb(6, 6, 59);">
                        <img src="{{ $lienImage }}" alt="" />
                    </div>
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
                $delete = DB::table('inscriptions')
                    ->where('id', $participant->id)
                    ->update([
                        'confirmation_attestion' => 1,
                    ]);

                $compteurDiv++;
            @endphp
        @endforeach
    </div>
</body>

</html>
