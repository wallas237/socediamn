<x-app-layout>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div>
                    {{ session('status') }}
                </div>
            </div>
        @endif
    </div>

    <div class="container w-50">
        <div class="card">
            <div class="card-body">
                <div class="flex align-content-center justify-content-center">

                    <div>
                        <h3 style="color: #062844ee;">
                            {{ "Formulaire d'enregistrement du personnel d'appui au congrès de la SAPLF & SCP" }}
                        </h3>
                    </div>


                </div>

                <br>

                <div class="container-form">
                    {{-- @if (session('inscription'))
                        <div style="display: flex; align-items: center; justify-content: center; width: 100%; ">
                            <div class="alert" style="background-color: #{{ session('color') }}; color: #fff;">
                                {{ session('inscription') }}
                            </div>
                        </div>
                    @endif --}}
                    <div class="help"
                        style="display: none; align-items: center; justify-content: center; width: 100%; ">
                        <div class="alert alert-warning" role="alert">

                        </div>
                    </div>
                    <input type="hidden" id="compter" value="1">
                    <form action="/personnel-appui" method="POST" id="form-inscription">
                        @csrf


                        <div class="col-12">

                            <div class="col-md-6 form-group">

                                <label for="titre" class="label text-dark">Civilité : </label>

                                <div class="d-flex">
                                    <select name="titre" id="titre" class="form-control w-50 text-dark">
                                        <option value="">Civilité</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Mlle.">Mlle.</option>
                                        <option value="Mme.">Mme.</option>
                                        <option value="M.">M.</option>
                                    </select>
                                    <span class="text-danger f-3">*</span>
                                    @error('titre')
                                        <span class="text-danger f-3">Vueillez remplir ce champ</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8 form-group">
                                <label for="name" class="form-label text-dark">Entrez votre nom : </label>
                                <div class="d-flex">
                                    <input type="text" name="name" id="name" placeholder="Entrez votre nom"
                                        class="form-control w-full bg-white text-dark" value="{{ old('name') }}"
                                        required>
                                    <span class="text-danger f-3">*</span>
                                </div>
                            </div>
                            <div class="col-md-8 form-group">
                                <label for="prenom" class="label-form text-dark">Entrez votre prénom : </label>
                                <div class="d-flex">
                                    <input type="text" name="prenom" id="prenom" placeholder="Prénom "
                                        class="form-control w-full bg-white text-dark" value="{{ old('prenom') }}"
                                        required />
                                    <span class="text-danger f-3">*</span>
                                </div>
                            </div>


                        </div>


                        <div class="col-md-8 form-group">
                            <div>
                                <label for="email" class="form-label text-dark">email : </label>
                                <div class="d-flex">
                                    <input type="email" class="form-control bg-white text-dark" name="email"
                                        placeholder="Adresse e-mail" id="email" value="{{ old('email') }}"
                                        required />
                                    <span class="text-danger f-3">*</span>
                                </div>
                            </div>
                            <br>
                            <div>
                                <label for="service" class="form-label text-dark">Service : </label>

                                <div class="d-flex">
                                    <select name="service" id="service" class="form-control text-dark">
                                        <option value="">Selectionner le Service</option>
                                        <option value="GESTIONNAIRE-SALLE">GESTIONNAIRE-SALLE</option>
                                        <option value="HOTESSE">HOTESSE</option>
                                        <option value="MEDIA">MEDIA</option>
                                        <option value="PROTOCOLE">PROTOCOLE</option>
                                        <option value="SECRETARIAT">SECRETARIAT</option>
                                        <option value="SECURITE">SECURITE</option>
                                        <option value="STEWARD">STEWARD</option>
                                    </select>
                                    <span class="text-danger f-3">*</span>
                                    @error('service')
                                        <span class="text-danger f-3">Vueillez remplir ce champ</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="input-group input-group-icon">
                                <button type="submit" class="btn bg-primary p-2"><i class="far fa-paper-plane"></i>
                                    Enregistrer</button>
                            </div>



                        </div>






                    </form>

                </div>


                <h4 style="width: 100%; text-align: center;" class="text-danger">En cas de difficultés contactez le
                    00237 680 816 056
                </h4>
                @php
                    session()->pull('inscription', session('inscription'));
                    session()->pull('color', session('color'));

                @endphp





            </div>
        </div>
    </div>








    <script>
        let suivant = document.querySelector('#suivant')
        let compteur = document.querySelector(".compteur")
        let compter = document.querySelector('#compter')
        suivant.addEventListener('click', () => {
            let ancienAffiche = document.querySelector('.show')
            let nouvelleAffiche = document.querySelector('.show').nextElementSibling;
            console.log(compter.value)
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
            if (compteurEtape == 2) {
                suivant.style.display = 'none'
            }
            compteur.innerHTML = compteurEtape
            compter.value = compteurEtape

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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
</x-app-layout>
