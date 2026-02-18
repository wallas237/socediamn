<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congrès SOCEDIAMN & SFADE</title>

    <link rel="icon" type="image/icon" href="/images/favicon.ico" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link href="/css/forms.css" rel="stylesheet">
    <link href="/css/event.css" rel="stylesheet">
    {{-- <link href="/css/presentation.css" rel="stylesheet">
    <link href="/assets/css/shasha.css" rel="stylesheet">
    <link href="/css/header.css" rel="stylesheet"> --}}
    {{-- <link href="/eduprix/css/theme.css" redl="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/aws/all.css" rel="stylesheet" />

    <style>
        .pdfshow {

            position: absolute;
            z-index: 2000;
            background: transparent;
            padding-top: 5%;
            width: 100%;
            text-align: center;
            display: none;

        }

        .pdfshow i {
            color: #4f0000fb;
            font-size: 2em;
            cursor: pointer;

        }





        .container-fluide {
            /* From https://css.glass */
            /* From https://css.glass */
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 5% 5%;
            width: 80%;
        }

        .container-fluide h3 {
            text-align: center;
            font-weight: bolder;
            font-size: 1.2em;
            /*color: rgb(191, 10, 10);*/
        }

        .container-fluide .container-form {
            padding-top: 5%;
        }

        .container-fluide .item {
            display: none;

        }

        .container-fluide .item.show {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
            transition-delay: 3s;

        }

        .container-fluide .item.show>div {
            display: flex;
            flex-direction: column;

        }

        .container-fluide .direction {
            display: flex;
            justify-content: space-between;
        }

        .container-fluide label,
        .form-control {
            font-weight: 600;
        }

        .container-fluide i {
            cursor: pointer;
            font-size: 1.5em;
        }

        button,
        .direction button,
        button span {
            font-weight: bold;
        }

        .conds-speaker {
            display: flex;
            flex-direction: column;
            row-gap: 20px;
        }

        .conds-speaker>div {
            display: flex;
            flex-direction: column;
            row-gap: 5px;
        }
    </style>

</head>

<body style="background: rgb(7, 102, 185);">
    <script>
        let inputShowFunction = async (inputShow) => {
            verification = 0
            await inputShow?.forEach(elt => {
                //console.log(elt.value.length)
                if (elt.value.length == 0) {
                    verification++
                }
            })


            return verification;
        }
    </script>
    {{-- @include('menu')
    <br><br> --}}
    {{-- <div class="pdfshow">
        <div style="display: block; text-align: center;">
            <p> <i class="fas fa-window-close"></i></p>
            <embed src=https://scpneumologie.com/archive/recommandationscp.pdf width=1200 height=500
                type='application/pdf' />
        </div>

    </div> --}}
    <div class="container-fluid jumbotron-fluid stay mt-5 pt-5 pb-5">

        <h2 class="text-center"> Soumission d'abstracts</h2>

        <h3 class="text-center mt-2" style="color: red;"></h3>

        <div class="container">
            <div class="container-fluide">



                <span class="text-align-center text-yellow-500"><strong class="">NB : Rassurez-vous de bien
                        remplir vos
                        informations, indispensables pour établir vos certificats  </strong></span>

                <br>
                    <a href="https://www.socediamn.org">Cliquez ici pour retourner sur le site</a>
                <br>
                <div class="container-form">
                    @if (session('abstract'))
                        <div style="display: flex; align-items: center; justify-content: center; width: 100%; ">
                            <div class="alert" style="background-color: #{{ session('color') }}; color: #fff;">
                                {{ session('abstract') }}
                            </div>
                        </div>
                    @else
                        <div style="display: flex; align-items: center; justify-content: center; width: 100%; ">
                            <div class="alert bg-info" style="color: #fff;">
                                {{-- {{ "Rassurez vous que l'auteur correspondant est inscrit avant de soumettre l'abstract" }} --}}
                                {{ 'Rassurez-vous que votre nom(s) & prénom(s) soient bien écrits, ils seront utilisés pour produire vos attestations' }}
                            </div>
                        </div>
                    @endif
                    <div class="help"
                        style="display: none; align-items: center; justify-content: center; width: 100%; ">
                        <div class="alert alert-warning" role="alert">

                        </div>
                    </div>
                    <input type="hidden" id="compter" value="1">
                    <form action="{{ route('abstract') }}" method="POST" enctype='multipart/form-data'
                        id="form-inscription">
                        @csrf


                        <div class="item show">

                            <div>
                                <label for="civilite">Civilité : </label>

                                <div class="flex">
                                    <select name="civilite" id="civilite" class="form-control w-25">
                                        <option value="">Civilité</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Pr">Pr</option>
                                        <option value="Mlle.">Mlle.</option>
                                        <option value="Mme.">Mme.</option>
                                        <option value="M.">M.</option>
                                    </select>
                                    <span class="text-danger f-3">*</span>
                                    @error('civilite')
                                        <span class="text-danger f-3">Veuillez remplir ce champ</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="name" class="form-label">Entrez votre nom & prénom: </label>
                                <div class="flex">
                                    <input type="text" name="name" id="name"
                                        placeholder="Entrez votre nom & prénom" class=""
                                        value="{{ old('name') }}" required>
                                    <span class="text-danger f-3">*</span>
                                </div>
                                <span class="text-danger">Nom en majuscule & la première lettre du prénom en majuscule
                                    le reste en miniscule Exemple KOUNDE Bernard</span>
                                @error('name')
                                    <span class="text-danger f-3">Veuillez remplir ce champ</span>
                                @enderror
                            </div>



                        </div>
                        <div class="item">
                            <div class="sm:w-full md:w-50 pl-1">
                                {{-- <input type="hidden" value="{{ csrf_token() }}" id="token"> --}}


                                <label for="titre">{{ "Titre de l'abstract" }} : </label>

                                <textarea name="titre_abstract" id="titre_abstract" cols="20" rows="10" required>{{ old('titre_abstract') }}</textarea>
                                @error('titre')
                                    <span class="text-danger f-3">Veuillez remplir ce champ</span>
                                @enderror
                            </div>

                            <div class="sm:w-full md:w-50 pl-1">
                                <label for="correspondant">Auteur correspondant : <span
                                        style="font-style: italic; font-weight: 100;">Nom et initiale du
                                        prénom</span> </label>
                                <input type="text" class="" value="{{ old('correspondant') }}"
                                    name="correspondant" id="correspondant" required />
                                @error('correspondant')
                                    <span class="text-danger f-3">Veuillez remplir ce champ</span>
                                @enderror
                            </div>
                            <div class="sm:w-full md:w-50 pl-1">
                                <label for="email_correspondant">{{ "email de l'auteur correspondant" }}</label>
                                <input type="email" class="" value="{{ old('email_correspondant') }}"
                                    name="email_correspondant" id="email_correspondant" required />
                                @error('emai_correspondant')
                                    <span class="text-danger f-3">Veuillez remplir ce champ</span>
                                @enderror
                            </div>





                            <label for="affiliation_auteur">Affiliation des auteurs : </label>

                            <textarea name="affiliation_auteur" id="affiliation_auteur" cols="20" rows="10" required>{{ old('affiliation_auteur') }}</textarea>

                            <span style="font-style: italic; font-weight: 100; color: rgb(105, 6, 6);">NB: Numérotez
                                les affiliations N°-Service/Faculté, Université/Formation Sanitaire, Ville, Pays et
                                séparez les par des slash(/)
                                <br>
                                Exemple :
                                1-Faculté de Médecine et des Sciences
                                Pharmaceutiques,
                                Université de Douala, Douala, Cameroun /

                                2-Service de Pédiatrie, Hôpital Général de Douala, Douala, Cameroun;
                            </span>


                            <label for="auteurs">Auteurs : </label>

                            <textarea name="auteurs" id="auteurs" cols="20" rows="10" required>{{ old('auteurs') }}</textarea>

                            <span style="font-style: italic; font-weight: 100; color: rgb(105, 6, 6);">NB: Pour
                                enregistrer un auteur et son affiliation, mettre le nom suivi {{ "d'un" }}
                                espace puis
                                le
                                numéro {{ "d'affiliation," }}. Utilisez le slash(/) pour séparer les auteurs Exp: Nom
                                Auteur 1,3/
                                Nom auteur 2
                            </span>
                            <div class="sm:w-full md:w-75 pl-1">
                                {{-- <label for="mot_cle">{{ 'Mots Clés' }}</label> --}}
                                <input type="hidden" class="" value="RAS" name="mot_cle"
                                    id="mot_cle" placeholder="Veuillez entrer, entre 3 à 5 mots clés"/>
                                {{-- @error('emai_correspondant')
                                    <span class="text-danger f-3">Veuillez remplir ce champ</span>
                                @enderror --}}

                            </div>

                        </div>
                        <div class="item">
                            {{-- <span style="font-style: italic; font-weight: 100; color: rgb(105, 6, 6);">NB:
                        {{ 'Introduction, méthodes, résultats et conclusion doivent contenir 300 mots maximum, police: Ariel, taille: 12, interligne: 1.5' }}
                    </span> --}}

                            <label for="introduction">Introduction : </label>

                            <textarea name="introduction" id="introduction" cols="20" rows="10" required>{{ old('introduction') }}</textarea>
                            <p class="text-danger introduction"></p>
                            <label for="methode">Méthodes : </label>
                            
                           <textarea name="methode" id="methode" cols="20" rows="10" required>{{ old('methode') }}</textarea>
                            <p class="text-danger methode" style="display: none;"></p>
                             
                             
                             
                             <label for="resultat">Résultats : </label>

                            <textarea name="resultat" id="resultat" cols="20" rows="10" required>{{ old('resultat') }}</textarea>
                            <p class="text-danger resultat" style="display: none;"></p>
                            
                            <label for="conclusion">Discussion : </label>
                            <textarea name="conclusion" id="conclusion" cols="20" rows="10" required>{{ old('conclusion') }}</textarea>
                            <p class="text-danger conclusion"></p>



                        </div>

                        <div class="item">


                            <div class="row">
                                <p class="text-danger mot-depasse">

                                </p>
                                <div class="input-group input-group-icon">
                                    <button type="submit" class="btn btn-primary bg-primary"
                                        style="display: flex; border: none;"><i class="far fa-paper-plane"></i>
                                        Envoyez</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
                <br>
                <div class="direction">
                    <button class="btn btn-danger" type="button" id="precedent">

                        <span class="btn btn-danger">Previous</span>
                        {{-- <span class="carousel-control-prev-icon">Previous</span> --}}
                    </button>
                    <button class="btn bg-blue-500 text-white">Etape <span
                            class="compteur text-white">1</span>/4</button>
                    <button class="btn btn-danger" type="button" id="suivant">
                        {{-- <span class="carousel-control-next-icon">Suivant</span> --}}
                        <span class="btn btn-danger">Suivant</span>
                    </button>
                </div>

                <h4 style="width: 100%; text-align: center;">En cas de difficultés contactez le 00237 698 711 769 ou envoyez un mail à <a href="mailto:congres2026@socediamn.org">congres2026@socediamn.org</a>       
                </h4>
                @php
                    session()->pull('abstract', session('abstract'));
                    session()->pull('color', session('color'));

                @endphp

            </div>
        </div>

        <script>
            let compteurEtape = 1;
        </script>








        <script>
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth' // Ajoute un effet de défilement fluide
                });
            }
            let suivant = document.querySelector('#suivant')
            let compteur = document.querySelector(".compteur")
            let compter = document.querySelector('#compter')
            suivant.addEventListener('click', () => {
                let verification = 0;
                let ancienAffiche = document.querySelector('.show')
                let nouvelleAffiche = document.querySelector('.show').nextElementSibling;
                let inputShow = document.querySelectorAll('.show input')
                let textareaShow = document.querySelectorAll('.show textarea')
                let selectShow = document.querySelectorAll('.show select')
                inputShow.forEach(elt => {
                    if (elt.value.length == 0) {
                        verification++
                        elt.style.border = "1px solid red"
                    } else {
                        elt.style.border = "1px solid gray"
                    }
                })

                textareaShow.forEach(elt => {
                    if (elt.value.length == 0) {
                        verification++
                        elt.style.border = "1px solid red"
                    } else {
                        elt.style.border = "1px solid gray"
                    }
                })

                selectShow.forEach(elt => {
                    if (elt.value.length == 0) {
                        verification++
                        elt.style.border = "1px solid red"
                    } else {
                        elt.style.border = "1px solid gray"
                    }
                })

                if (verification === 0) {
                    if (nouvelleAffiche == null) {
                        suivant.style.display = 'none'
                        //finish.style.display = "flex"
                    } else {
                        ancienAffiche.classList.remove('show')
                        nouvelleAffiche.classList.add('show')
                        precedent.style.display = "flex"
                        nouvelleAffiche.style.transitionDelay = "5s"


                        // finish.style.display = "none"


                    }



                    compteurEtape = new Number(compter.value) + 1
                    if (compteurEtape == 4) {
                        suivant.style.display = 'none'
                        scrollToTop()
                    }
                    compteur.innerHTML = compteurEtape
                    compter.value = compteurEtape
                }

            })

            let precedent = document.querySelector('#precedent')
            precedent.style.display = "none"

            precedent.addEventListener('click', () => {
                let ancienAffiche = document.querySelector('.show')
                let nouvelleAffiche = document.querySelector('.show').previousElementSibling;

                if (nouvelleAffiche == null) {
                    precedent.style.display = 'none'
                } else {
                    ancienAffiche.classList.remove('show')
                    nouvelleAffiche.classList.add('show')
                    precedent.style.display = "flex"
                    suivant.style.display = 'flex'
                    precedent.style.transitionDelay = "3s"
                    //finish.style.display = "none"
                }

                compteurEtape = new Number(compter.value) - 1

                if (compteurEtape == 1) {
                    precedent.style.display = 'none'
                }
                compteur.innerHTML = compteurEtape

                compter.value = compteurEtape
            })
        </script>


    </div>
    @php
        session()->pull('abstract', session('abstract'));
        session()->pull('color', session('color'));

    @endphp



    <script src="{{ asset('js/form.js') }}"></script>
    {{--


    @include('footer')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="/assets/lib/jquery/dist/jquery.js"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/lib/wow/dist/wow.js"></script> --}}


</body>

</html>
