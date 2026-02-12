@include('entete')



</div>
@php
    /*  $ip = request()->ip();
       $url = "http://api.ipapi.com/".$ip."?access_key=811e7e7505f03a5397a1988b7860b804";
        $raw = file_get_contents($url);
        $json = json_decode($raw, true);
        $flag = "";
        $code_pays = "";
        foreach($json['location'] as $k => $v){
                if($k=='calling_code'){
                    $code_pays =  $v;
                }else if($k=='country_flag'){
                    $flag = $v;
                }
        }*/
@endphp
<br><br>
@if (session('inscription'))
    <div style="display: flex; align-items: center; justify-content: center; width: 100%; ">
        <div class="alert" style="width: 50%; background-color: #{{ session('color') }}; color: #fff;">
            {{ session('inscription') }}
        </div>
    </div>
@endif
<div class="direction" style="display: none; align-items: center; justify-content: center; width: 100%; ">
    <div class="alert"
        style="display: flex; align-items: center; justify-content: width: 50%; background-color: #0088aafa;  color: #fff; font-size: 1.3em;">

    </div>
</div>
<div class="containerform">



    <form action="/save-enregistrer-service" method="POST">
        @csrf
        <div class="row">
            <h4>{{ "FORMULAIRE D'INSCRIPTION DES SERVICES ANNEXES" }}</h4>
            <br>
            <div class="row">
                <h4>Identité</h4>
                <br>
                <div class="">
                    
                        <select name="titre" id="titre">
                            <option value="0">Choisir Civilité</option>
                            <option value="M.">M.</option>
                            <option value="Mme.">Mme.</option>
                            <option value="Mlle.">Mlle.</option>
                            <option value="Dr">Dr</option>
                            <option value="Pr">Pr</option> 
                        </select>
                </div>

            </div>
            <br>
            <div class="input-group input-group-icon">
                <input type="text" name="name" placeholder="Nom " required />
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input type="text" name="prenom" placeholder="Prénom " required />
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">

                <div class="col-half">
                    <div class="input-group">
                        <select name="service" id="service">
                            <option value="0">Choisir Service</option>
                            <option value="SECRETARIAT">SECRETARIAT</option>
                            <option value="HOTESSE">HOTESSE</option>
                            <option value="LOGISTIQUE">LOGISTIQUE</option>
                            <option value="MEDIA">MEDIA</option>
                            <option value="SECURITE">SECURITE</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="input-group input-group-icon">

                <input type="email" name="email" placeholder="Adresse e-mail" required />
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input type="text" name="telephone" placeholder="Téléphone" placeholder="00" required />
                <div class="input-icon"><i class="fa fa-phone-alt"></i></div>
            </div>

        </div>
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
    session()->pull('inscription', session('inscription'));
    session()->pull('color', session('color'));

@endphp

<br><br>




<script>
    
    let form = document.querySelector('.containerform form')
    form.addEventListener('submit', (e) => {
        let select = document.querySelectorAll('form select')
        select.forEach(elt => {
            if (elt.value == "0") {
                e.preventDefault()
                let inser = document.querySelector('.direction div')
                let direction = document.querySelector('.direction')
                direction.style.display = "flex"
                let inf = ""
                elt.style.border = "1px solid #f0a500"
                inser.innerHTML = "Bien vouloir remplir tous les champs"
            }
        })
        
    })
   
   
   
</script>

</body>

</html>
