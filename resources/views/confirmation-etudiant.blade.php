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
    <form action="/etudiant-confirmation-save" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <h4>{{ "Formulaire d'upload de réçu " }}</h4>
            <br>
            
            <input type="hidden" name="id" value={{ $id }}>
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
