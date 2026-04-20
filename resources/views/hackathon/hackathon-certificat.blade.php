<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat participation congres SOCEDIAMN & SFADE</title>
    <style>
        @font-face {
            font-family: 'Apple Chancery';
            src: {{ public_path('/assets/fonts/AppleChancery.ttf') }} format('truetype');
            /* font-weight: normal;
            font-style: normal; */
        }

        body {
            margin: 0px 0px;
            padding: 0px 0px;


        }
        h1{
            font-family: "Apple Chancery" !important;
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
            top: 36%;
            text-align: center;
            font-size: 2.3em;
            font-style: italic;
            font-family: 'Apple Chancery' !important;
        }

        h3 {
            position: absolute;
            z-index: 1000;
        }
    </style>
</head>

<body>
    {{-- $inscription->titre." ". --}}
    <h1 class="name" style="font-family: 'Apple Chancery' !important;">{{ "BANEZOUE KWATCHOUA LIONEL WULLIS" }}</h1>

    {{--  <h3>{{ strlen('The right ventricle in patients with obstructive sleep apnea syndrome in yaoundé,') }}</h3>  --}}
    <div class="bg-certificate">

        <img src="assets/images/attestation/congres/participation.png" alt="" id="bg">
    </div>
</body>

</html>
