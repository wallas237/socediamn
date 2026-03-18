@include('entete')
</div>
<br><br>
@if (session('abstract'))
    <div style="display: flex; align-items: center; justify-content: center; width: 100%; ">
        <div class="alert" style="width: 50%; background-color: #{{ session('color') }}; color: #fff;">
            {{ session('abstract') }}
        </div>
    </div>
@endif
<div class="direction" style="display: none; align-items: center; justify-content: center; width: 100%; ">
    <div class="alert"
        style="display: flex; align-items: center; justify-content: width: 50%; background-color: #0088aafa;  color: #fff; font-size: 1.3em;">

    </div>
</div>

<div class="containerform">
    <form action="/resume-save" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <h4>{{ "FORMULAIRE DE SOUMISSION D'ABSTRACT" }}</h4>

            <br>
            <div class="row">
                <select name="civilite" id="civilite" style="width: 20%;">
                    
                    <option value="Dr">Dr</option>
                    <option value="Pr">Pr</option>
                    <option value="M.">M.</option>
                     <option value="Mlle.">Mlle.</option>
                    <option value="Mme.">Mme.</option>
                    
                </select>
            
            </div>
            <br>
            <div class="row">
                <div class="input-group input-group-icon">
                    <input type="text" name="name" placeholder="Nom & Prénom" id="name" required />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
            </div>
            <div class="input-group input-group-icon">
                <textarea name="titre" id="titre2" cols="50" placeholder="Entrez le thème de votre abstract" rows="5"></textarea>

            </div>
            

            <div class="row">
                <div class="input-group input-group-icon">
                    <input type="text" name="email" placeholder="E-mail" id="email" required />
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" name="telephone" placeholder="Telephone" id="telephone" required />
                    <div class="input-icon"><i class="fa fa-phone-alt"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="input-group input-group-icon">
                    <input type="file" name="fichier" id="fichier" required />
                    <div class="input-icon"><i class="far fa-file-word"></i></div>
                </div>


            </div>
            <div class="row">
                <div class="input-group input-group-icon">
                    <button class="btn btn-primary"><i class="far fa-paper-plane"></i> Envoyer</button>
                </div>
            </div>
        </div>
    </form>
</div>
@php
    session()->pull('abstract', session('abstract'));
    session()->pull('color', session('color'));
    
@endphp



</body>

</html>
