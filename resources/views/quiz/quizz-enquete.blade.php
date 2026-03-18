<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QUIZ Enquête de satisfaction congrès SAPLF & SCP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        /** {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #3A5D9F;
            height: 100vh;
        }

        .formbold-main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
            background-color: transparent;
        }

        .formbold-form-wrapper {
            margin: 0 auto;
            max-width: 600px;
            width: 100%;
            background: white;
            position: relative;
        }

        .formbold-img {
            margin-bottom: 40px;
        }

        .formbold-input-flex {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .formbold-input-flex>div {
            width: 50%;
        }

        .formbold-form-input {
            width: 100%;
            padding: 13px 22px;
            border-radius: 5px;
            border: 1px solid #dde3ec;
            background: #ffffff;
            font-weight: 500;
            font-size: 16px;
            color: #536387;
            outline: none;
            resize: none;
        }

        .formbold-form-input:focus {
            border-color: #3A5D9F;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-form-label {
            color: #536387;
            font-weight: 500;
            font-size: 14px;
            line-height: 24px;
            display: block;
            margin-bottom: 10px;
        }

        .formbold-mb-5 {
            margin-bottom: 20px;
        }

        .formbold-radio-flex {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .formbold-radio-label {
            font-size: 14px;
            line-height: 24px;
            color: #07074d;
            position: relative;
            padding-left: 25px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .formbold-input-radio {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .formbold-radio-checkmark {
            position: absolute;
            top: -1px;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #ffffff;
            border: 1px solid #dde3ec;
            border-radius: 50%;
        }

        .formbold-radio-label .formbold-input-radio:checked~.formbold-radio-checkmark {
            background-color: #3A5D9F;
        }

        .formbold-radio-checkmark:after {
            content: '';
            position: absolute;
            display: none;
        }

        .formbold-radio-label .formbold-input-radio:checked~.formbold-radio-checkmark:after {
            display: block;
        }

        .formbold-radio-label .formbold-radio-checkmark:after {
            top: 50%;
            left: 50%;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #ffffff;
            transform: translate(-50%, -50%);
        }

        .formbold-btn {
            text-align: center;
            width: 50%;
            font-size: 16px;
            border-radius: 5px;
            padding: 14px 25px;
            border: none;
            font-weight: 500;
            background-color: #3A5D9F;
            color: white;
            cursor: pointer;
            margin-top: 25px;
        }

        .formbold-btn:hover {
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .titre {
            height: 20vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            row-gap: 15px;
            background-color: #54B3F2FF;
            margin-top: -21px;
            width: 100%;

        }

        .items {
            display: none !important;
        }

        .items.active {
            display: flex !important;
            flex-direction: column;
            align-items: center;
            justify-content: center;

        }

        .control span {
            padding: 15px 20px;
            background-color: #f2a654;
            font-style: italic;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .control .desactive {
            display: none;
        }

        .control span:hover {
            padding: 15px 20px;
            border: 2px solid #f2a654;
            background-color: whitesmoke;
            font-style: italic;
            color: #f2a654;
            border-radius: 5px;

        }*/
    </style>
</head>

<body style="background:#0787DDFF;">
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div>
                    {{ session('status') }}
                </div>
            </div>
        @endif
    </div>


    <div class="container">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->

        <div class="card">
            <div class="card-title">
                <div class="titre bg-info p-3">
                    <h3 style="color: whitesmoke;"> Enquête de satisfaction du
                        Congrès de la <strong>SAPLF & SCP</strong>
                    </h3>
                    <h2 class="p-2" style="color: whitesmoke; font-weight: bold;">
                        Titre de la session : {{ $titre->titre_enquete }}

                    </h2>

                    {{-- <p style="color: whitesmoke;">Merci de participer à l'évaluation de {{ $titre->titre_enquete }} --}}
                    {{-- </p> --}}
                </div>
            </div>
            <div class="card-body">

                <form action="/enquete-satisfaction-confres-saplf-scp/{{ $titre->id }}" method="POST">

                    @csrf

                    <input type="hidden" value="{{ $titre->id }}" name="enquete_model_id">





                    <div class="items {{ 'active' }}" style="padding: 15px;">

                        <p style="color: rgb(156, 17, 17);">
                            <strong style="text-decoration: underline;">NB: </strong> Veuillez évaluer la session que vous venez de suivre,
                             en attribuant <strong>une note entre 1 et 10 sur 10</strong>,
                            chacun des items de 1 à 5, et en ajoutant éventuellement <strong>un commentaire libre</strong> au 6e point
                            <br>
                            Noter que la collecte de ces données est anonyme.
                        </p>
                        @foreach ($questions as $s)
                            <div class="formbold-mb-5" style="text-align: left;">

                                <label for="{{ $s->id }}" class="formbold-form-label">
                                    {{ $s->libelle_question }}
                                </label>

                                <div class="formbold-radio-flex" style="padding-bottom: 5px;">

                                    <div style="display: flex; justify-content: space-between;">
                                        <input type="hidden" name="{{ 'question_model_id' . $s->id }}"
                                            value="{{ $s->id }}" />
                                        @for ($i = 1; $i <= 10; $i++)
                                            <div class="formbold-radio-group">
                                                <label class="formbold-radio-label">
                                                    <input class="formbold-input-radio" type="radio"
                                                        name="{{ 'note' . $s->id }}" value="{{ $i }}"
                                                        required />

                                                    {{ $i }}
                                                    <span class="formbold-radio-checkmark"></span>
                                                </label>
                                            </div>
                                        @endfor

                                    </div>

                                </div>

                            </div>
                        @endforeach
                        <div style="padding: 15px;">
                            <label for="">Commentaire & Suggestions</label>
                            <br>
                            <textarea name="commentaire_libre" id="commentaire" cols="30" rows="10"></textarea>
                        </div>
                        <div class="items {{ 'active' }}"
                            style="display: flex; justify-content: center !important; ">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>



                    {{-- <div class="items" style="display: flex; justify-content: center !important; padding-bottom: 15px;">
                    <button type="submit" class="formbold-btn">Enregistrer</button>
                </div> --}}

                </form>
                {{-- <div class="control" style="display: flex; justify-content: space-between; padding: 20px;">
                <span id="precedent" class="desactive">Précédent</span>
                <span id="suivant">Suivant</span>
            </div> --}}
            </div>
        </div>

    </div>
    @php
        session()->pull('inscription', session('inscription'));
        session()->pull('color', session('color'));

    @endphp
    <script>
        let items = document.querySelectorAll(".items")
        let totalItems = items.length

        let precedent = document.querySelector("#precedent")
        let suivant = document.querySelector("#suivant")
        let desactive = document.querySelector(".desactive")

        suivant?.addEventListener("click", function() {
            let desactive = document.querySelector('.desactive')
            let items = document.querySelector(".items.active")
            let next = items.nextElementSibling;
            items.classList.remove('active')
            next.classList.add('active')
            let compteur = document.querySelector("#compteur")
            let valueCompteur = new Number(compteur.value);
            valueCompteur++
            compteur.value = valueCompteur
            desactive.style.display = "flex"
            if (valueCompteur > 15) {
                suivant.style.display = "none"
            }

        })

        precedent?.addEventListener("click", function() {

            let compteur = document.querySelector("#compteur")
            let valueCompteur = new Number(compteur.value);
            let items = document.querySelector(".items.active")
            let previous = items.previousElementSibling;
            items.classList.remove('active')
            previous.classList.add('active')
            if (valueCompteur > 1) {
                valueCompteur--
                compteur.value = valueCompteur

            }

            if (valueCompteur == 1) {
                precedent.style.display = "none"
            }


            if (valueCompteur < 16) {
                suivant.style.display = "flex"
            }


        })
    </script>
</body>

</html>
