<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Badge participant</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .container {

            /*margin-top: -5%;*/
            width: 100%;
            /* background-color: rgb(210, 42, 42);*/
            display: flex;
            justify-content: space-between;

            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /*row-gap: 15px;*/
        }

        .container>div {
            width: 49%;
            position: relative;


            /*background-image: url('../img/bg.png');*/
        }

        img {
            width: 88%;
        }

        .contenu {
            display: none;
            position: absolute;
            top: 20%;
            /* z-index: 10000;
            bottom: 20%;*/

        }

        /*.col-1 {
            top: -3%;
        }

        .col-2 {
            right: 0%;
            top: -3%;
        }

        .col-3 {
            top: 535px;
        }

        .col-4 {
            right: 0%;
            top: 535px;
        }*/
    </style>
</head>

<body>
    <div class="container">
        @php
            $i = 0;
        @endphp
        @foreach ($inscription as $v)
            @if ($i == 0)
                <div class="col-1">
                    <img src="{{ asset('img/bg.png') }}" alt="">
                    <div class="contenu">
                        {!! QrCode::size(100)->generate("$v->id $v->name $v->prenom") !!}
                    </div>

                </div>
            @elseif($i == 1)
                <div class="col-2">
                    <img src="{{ asset('img/bg.png') }}" alt="">
                    <div class="contenu">
                        {!! QrCode::size(100)->generate("$v->id $v->name $v->prenom") !!}
                    </div>
                </div>
            @elseif($i == 2)
                <div class="col-3">
                    <img src="{{ asset('img/bg.png') }}" alt="">
                    <div class="contenu">
                        {!! QrCode::size(100)->generate("$v->id $v->name $v->prenom") !!}
                    </div>
                </div>
            @elseif($i == 3)
                <div class="col-4">
                    <img src="{{ asset('img/bg.png') }}" alt="">
                    <div class="contenu">
                        {!! QrCode::size(100)->generate("$v->id $v->name $v->prenom") !!}
                    </div>
                </div>
            @endif

            @if ($i == 3)
                @php
                    $i = 0;
                @endphp
            @else
                @php
                    $i++;
                @endphp
            @endif
        @endforeach
    </div>
</body>

</html>


{{--  <div class="visible-print text-center">
    @php
        $inscris = DB::table('inscriptions')->get();
    @endphp
    @foreach ($inscris as $v)
        
    
    {!! QrCode::size(100)->generate("$v->id $v->name $v->prenom"); !!}
    <br>
    <br>
    
    @endforeach
</div>  --}}
