@include('entete');
</div>
<div class="modal3">
    <div id="containerlaboratoire">
        <span><i class="fas fa-times"></i></span>

        <form action="" method="POST" id="laboratoire">
            @csrf
            <div class="row">
                <h4>Laboratoire</h4>
                <br>
                <div class="input-group input-group-icon">
                    <input type="text" name="labo" id="labo" placeholder="Nom du labo " required />
                    <div class="input-icon"><i class="fas fa-flask"></i></div>
                </div>

            </div>


            <div class="row">
                <div class="input-group input-group-icon">
                    <button class="btn btn-primary"> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>



<br><br>
@if (session('inscriptiondelegue'))
    <div style="display: flex; align-items: center; justify-content: center; width: 100%; ">
        <div class="alert" style="width: 50%; background-color: #{{ session('color') }}; color: #fff;">
            {{ session('inscriptiondelegue') }}
        </div>
    </div>
@endif
<div class="direction" style="display: none; align-items: center; justify-content: center; width: 100%; ">
    <div class="alert"
        style="display: flex; align-items: center; justify-content: width: 50%; background-color: #0088aafa;  color: #fff; font-size: 1.3em;">

    </div>
</div>
<div class="containerform">



    <form action="/save-delegue" method="POST">
        @csrf
        <div class="row">
            <h4>{{ "FORMULAIRE D'INSCRIPTION DES LABORATOIRES" }}</h4>
            <br>
            <div class="row">
                <h4>Identité</h4>
                <br>
                <div class="">
                    <div class="">
                        <select name="titre" id="titre">
                            <option value="M.">M.</option>
                            <option value="Mme.">Mme.</option>
                            <option value="Mlle.">Mlle.</option>
                            <option value="Dr">Dr</option>
                            <option value="Pr">Pr</option>



                        </select>

                    </div>
                </div>

            </div>
            <br>
            <div class="input-group input-group-icon">
                <input type="text" name="nom" placeholder="Nom Complet" required />
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>



            <h4>Contact</h4>
            <br>
            <div class="input-group input-group-icon">

                <input type="email" name="email" placeholder="Adresse e-mail" required />
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
            </div>
            <h4>Informations pratiques</h4>
            <br>

            {{--  <div>
                <div class="input-group input-group-icon">

                    <input type="number" name="stand"
                        placeholder="Indiquez le nombre de stand que vous souhaitez prendre" required />
                    <div class="input-icon"><i class="fas fa-umbrella-beach"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <div class="col-half">
                        <div class="input-group">
                            <select name="symposium" id="symposium" style="width: 400px;">
                                <option value="Aucun">Souhaiteriez-vous organiser un Symposium</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>



                        </div>
                    </div>

                </div>
                <div class="input-group input-group-icon">
                    <div class="col-half">
                        <div class="input-group">
                            <select name="publicite" id="publicite" style="width: 400px;">
                                <option value="Aucun">Souhaiteriez-vous une insertion publicitaire</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>



                        </div>
                    </div>

                </div>
                <div class="input-group input-group-icon">

                    <input type="number" name="specialiste"
                        placeholder="Indiquez le nombre de spécialistes que vous souhaitez inscrire" required />
                    <div class="input-icon"><i class="fas fa-user-md"></i></div>
                </div>
                <div class="input-group input-group-icon">

                    <input type="number" name="medecin"
                        placeholder="Indiquez le nombre de médecins que vous souhaitez inscrire" required />
                    <div class="input-icon"><i class="fas fa-user-md"></i></div>
                </div>

                <div class="input-group input-group-icon">

                    <input type="number" name="infirmier"
                        placeholder="Indiquez le nombre d'infirmiers(es) que vous souhaitez inscrire" required />
                    <div class="input-icon"><i class="fas fa-user-nurse"></i></div>
                </div>
                <div class="input-group input-group-icon">

                    <input type="number" name="etudiant"
                        placeholder="Indiquez le nombre d'étudiants(es) que vous souhaitez inscrire" required />
                    <div class="input-icon"><i class="fas fa-graduation-cap"></i></div>
                </div>

            </div>  --}}


        </div>




        <div>
            <div class="row">
                <div class="col-half">
                    <div class="input-group">
                        <select name="labo_id" id="labo_id">
                            <option value="Aucun">Laboratoire</option>
                            @foreach ($labos as $k => $v)
                                <option value="{{ $v->id }}">{{ $v->labo }}</option>
                            @endforeach
                        </select>
                        <span class="labo">
                            <i class="far fa-plus-square"></i>
                        </span>


                    </div>
                </div>

            </div>

        </div>
        <!--<div class="row">
      <h4>Terms and Conditions</h4>
      <div class="input-group">
        <input id="terms" type="checkbox"/>
        <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
      </div>
    </div>-->
        <div class="row">
            <div class="input-group input-group-icon">
                <button class="btn btn-primary"><i class="far fa-paper-plane"></i> Envoyer</button>
            </div>
        </div>
    </form>
</div>
<br>
<h4 style="width: 100%; text-align: center;">En cas de difficultés contactez le service technique au 00237 698 711 769
</h4>
@php
    session()->pull('inscriptiondelegue', session('inscriptiondelegue'));
    session()->pull('color', session('color'));

@endphp

<br><br>




<script>
    /** open laboratoire */
    /**open and close speciality */
    let laboratoires = document.querySelector('.containerform .labo')
    let close3 = document.querySelector('.modal3 span i')
    let modal3 = document.querySelector('.modal3')
    let containerlaboratoire = document.querySelector('#containerlaboratoire')
    laboratoires.addEventListener('click', () => {

        modal3.style.display = "flex"
        let y = window.scrollY
        if (screen.width <= 1000) {
            containerlaboratoire.style.marginTop = y + "px"
        } else {
            containerlaboratoire.style.marginTop = y + "px"
        }

    })
    close3.addEventListener('click', () => {
        modal3.style.display = "none"
    })
    /** */

    /**/



    let formslabo = document.querySelector('.modal3 form')
    formslabo.addEventListener('submit', (e) => {
        alert('sdf')
        let laboratoire = document.querySelector('.modal3 form #labo')

        let laboC = document.querySelector('.containerform form #labo')
        console.log(laboratoire.value)
        e.preventDefault()
        let xhr = new XMLHttpRequest()
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                let value = xhr.responseText

                let tab = value.split(';')
                let donnee = tab[1].split('/')
                laboC.innerHTML = ""
                let option = document.createElement('option')

                option.value = donnee[0]
                option.innerHTML = donnee[1]
                laboC.appendChild(option)
                modal3.style.display = "none"
            }

        }
        var data = new FormData()
        data.append("labo", laboratoire.value)
        data.append("_token", '{{ csrf_token() }}')
        xhr.open("POST", "/laboratoire")
        //data.append("login", login.value)
        //data.append("mot_de_passe", password.value)
        xhr.send(data)

    })

    let containerform = document.querySelector('.containerform form')
    containerform.addEventListener('submit', (e) => {
        let i = 0;
        let select = document.querySelectorAll('.containerform form select')
        select.forEach(elt => {
            elt.style.border = "2px solid #333333fb"
            if (elt.value === "Aucun") {
                elt.style.border = "2px solid #550000fb"
                i++
                e.preventDefault();
            }
        })

    })
</script>

</body>

</html>
