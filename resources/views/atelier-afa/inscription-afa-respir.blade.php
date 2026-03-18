<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Société Camerounaise de Pneumologie</title>
    <link rel="icon" type="image/icon" href="https://scpneumologie.com/images/favicon.ico" />


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link href="https://scpneumologie.com/css/forms.css" rel="stylesheet">
    <link href="https://scpneumologie.com/css/event.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link href="/css/presentation.css" rel="stylesheet">
    <link href="/assets/css/shasha.css" rel="stylesheet">
    <link href="/css/header.css" rel="stylesheet"> --}}
    {{-- <link href="/eduprix/css/theme.css" rel="stylesheet"> --}}
    <link href="https://scpneumologie.com/aws/all.css" rel="stylesheet" />
    <style>
        table {
            table-layout: fixed;
            width: 100%;
            border: 1px solid black;
        }

        th {
            border: 1px solid black;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            height: 5vh;
        }

        td {
            border: 1px solid black;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            height: 4vh;
        }
    </style>





</head>

<body>
    {{-- @include('menu') --}}


    <div class="container-fluid jumbotron-fluid stay pt-5 pb-5">

        <h2 class="text-center text-info" style="text-align: center;"> L'ESSENTIEL SUR LA VNI, LA PPC ET L'OXYGENOTHERAPIE EN AIGU</strong> </h2>

        <h3 class="text-center  text-danger">NB: {{ "L'inscription à cet atélier n'équivaut pas à votre inscription au congrès" }}</h3>
        <br><br>
        @if (session('inscr'))
            <div style="display: flex; align-items: center; justify-content: center; width: 100%; ">
                <div class="alert" style="width: 50%; background-color: #{{ session('color') }}; color: #fff;">
                    {{ session('inscr') }}
                </div>
            </div>
        @endif
        <div class="direction" style="display: none; align-items: center; justify-content: center; width: 100%; ">
            <div class="alert"
                style="display: flex; align-items: center; justify-content: width: 50%; background-color: #0088aafa;  color: #fff; font-size: 1.3em;">

            </div>
        </div>
        <div class="containerform">



            <form action="{{ route('atelier.afa.respire.inscription') }}" method="POST">
                @csrf
                <div class="row">
                    <h4>Atelier organiser par AFA Respir</h4>



                        <div class="input-group input-group-icon">
                            <select name="titre" id="titre" class="w-50">
                                <option value="">Civilité</option>
                                <option value="M.">M.</option>
                                <option value="Pr">Pr</option>
                                <option value="Dr">Dr</option>
                                <option value="Mme.">Mlle.</option>
                                <option value="Mme.">Mme.</option>

                            </select>
                            @error('titre')
                                <span class="text-danger">Veuillez remplir ce champ</span>
                            @enderror
                        </div>

                        <div class="input-group input-group-icon">
                            <input type="text" name="name" placeholder="Nom" value="{{ old('name') }}" required />
                            @error('name')
                                <span class="text-danger">Veuillez remplir ce champ</span>
                            @enderror
                        </div>
                        <div class="input-group input-group-icon">
                            <input type="text" name="prenom" placeholder="Prénom " value="{{ old('prenom') }}" required />
                            @error('prenom')
                                <span class="text-danger">Veuillez remplir ce champ</span>
                            @enderror
                        </div>
                        <div class="input-group input-group-icon">
                            <select name="qualite" id="qualite" class="w-50">
                                <option value="">Selectionner qualité</option>
                                <option value="Pneumologue">Pneumologue (15000 Fcfa)</option>
                                <option value="Autres Spécialiste">Autres Spécialiste (15000 Fcfa)</option>
                                <option value="Résident">Résident (10000 Fcfa)</option>
                                <option value="Médecin généraliste">Médecin généraliste (10 000 FCFA)</option>
                                <option value="Exposant">Exposant (100 000 FCFA)</option>
                                <option value="Paramédical et technicien biomédical">Paramédical et technicien biomédical (5 000 FCFA)</option>
                                <option value="Conférencier (Invité par le comité scientifique, pas de frais d'inscription)">Conférencier </option>
                            </select>
                            @error('qualite')
                                <span class="text-danger">Veuillez remplir ce champ</span>
                            @enderror
                        </div>




                        <div class="input-group input-group-icon">
                            <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}" required />
                        </div>

                        <div class="input-group input-group-icon">
                            <div class="input-icon"></div>
                        </div>

                        <div class="input-group input-group-icon">
                            <input type="text" name="ville" placeholder="Ville d'exercice " value="{{ old('ville') }}" required />
                        </div>
                        <div class="input-group input-group-icon">
                            <input type="text" name="pays" placeholder="Pays d'exercice " value="{{ old('pays') }}" required />
                        </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="input-group input-group-icon">

                        <button class="btn btn-primary" type="submit" style="color: whitesmoke;">
                            Envoyer</button>
                    </div>
                </div>
                <h4 class="text-danger" style="width: 100%; text-align: center;">En cas de difficultés contactez le (whatsapp uniquement) 00237 680 816 056
                </h4>
            </form>
        </div>

        @php
            session()->pull('inscr', session('inscr'));
            session()->pull('color', session('color'));

        @endphp






    </div>







</body>

</html>
