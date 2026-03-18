@include('entete')
   
<div class="modal1">
    <div id="containergrade">
    <span><i class="fas fa-times"></i></span>
        <form action="" method="POST" id="grade">
        @csrf
            <div class="row">
            <h4>Ajouter une Spécialité</h4>
            <br>
            <div class="input-group input-group-icon">
                <input type="text" name="grade" id="grade" placeholder="Spécialité" required />
                
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
<div class="modal2">
    <div id="containerspecialite">
        <span><i class="fas fa-times"></i></span>
        
        <form action="" method="POST" id="specialite">
        @csrf
            <div class="row">
            <h4>Specialité</h4>
            <br>
            <div class="input-group input-group-icon">
                <input type="text" name="specialite" id="specialite" placeholder="Specialité" required />
               
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
<div class="modal4">
    <div id="containerdelegue">
        <span><i class="fas fa-times"></i></span>
        
        <form action="" method="POST" id="delegue">
        @csrf
            <div class="row">
            <h4>Délégué</h4>
            <br>
            <div class="input-group input-group-icon">
                <input type="text" name="nom" id="nom" placeholder="Nom du Délégué " required />
               
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
   @if(session('inscription'))
   <div style="display: flex; align-items: center; justify-content: center; width: 100%; ">
        <div class="alert" style="width: 50%; background-color: #{{session('color')}}; color: #fff;">
          {{session('inscription')}}
        </div>
    </div>
    @endif
    <div class="direction" style="display: none; align-items: center; justify-content: center; width: 100%; ">
        <div class="alert" style="display: flex; align-items: center; justify-content: width: 50%; background-color: #0088aafa;  color: #fff; font-size: 1.3em;">
         
        </div>
    </div>
<div class="containerform">
   

    
  <form action="/inscription-save" method="POST" >
  @csrf
    <div class="row">
      <h4>{{ "FORMULAIRE D'INSCRIPTION DES PARTICIPANTS" }}</h4>
      <br>
        <div class="row">
             <h4>Identité</h4>
             <br>
            <div class="">
                <div class="">
                    <select name="titre" id="titre">
                        
                        <option value="Dr">Dr</option>
                        <option value="Pr">Pr</option>
                         <option value="Mlle.">Mlle.</option>
                        <option value="Mme.">Mme.</option>
                        <option value="M.">M.</option>
                    </select>
                
                </div>
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
                    <select name="grade" id="grade">
                        <option value="0">Spécialité</option>
                        @foreach($grades as $k=>$v)
                        <option value="{{$v->id}}">{{$v->titre}}</option>
                        @endforeach
                    </select>
                    <span class="grade"> 
                        <i class="far fa-plus-square"></i> 
                    </span>
            
            
                </div>
            </div>
        
       
      </div>
      <div class="input-group input-group-icon">
       
        
            <div class="col-half">
                <select name="specialite" id="specialite" >
                    <option value="choisir">Catégorie</option>
                    @foreach($specia as $k=>$v)
                    <option value="{{$v->id}}">{{$v->speciality}}</option>
                    @endforeach
                </select>
                {{--<span class="specialite">
                    <i class="far fa-plus-square"></i>
                </span>--}}
            </div>
       
      </div>
       <h4>Contact</h4>
         <br>
      <div class="input-group input-group-icon">

        <input type="email" name="email" placeholder="Adresse e-mail" required />
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" name="telephone" placeholder="Téléphone" placeholder="00" required />
        <div class="input-icon"><i class="fa fa-phone-alt"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text"  name="pays" placeholder="Pays " placeholder="Pays" required />
        <div class="input-icon"><i class="fas fa-map-marker-alt"></i></div>
      </div>
      {{--<div class="input-group input-group-icon">
        <input type="text"  name="ville" placeholder="Ville " placeholder="Ville" required />
        <div class="input-icon"><i class="fas fa-map-marker-alt"></i></div>
      </div>--}}
    </div>
    
   
   
    {{--<div class="row">
      
      <div class="col-half">
        <h4>Sexe</h4>
        <div class="input-group">
          <input id="gender-male" type="radio" name="gender" value="male" required />
          <label for="gender-male">Masculin</label>
          <input id="gender-female" type="radio" name="gender" value="female" required />
          <label for="gender-female">Feminin</label>
        </div>
      </div>
    </div>--}}
    <div class="row">
        <div class="col-half">
            <div class="input-group">
                <select name="charge" id="charge">
                    <option value="choisir">Pris en charge par un labo</option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
                <em style="width: 100%;"> 
                    Précisez si vous-êtes pris en charge par un laboratoire
                </em>
            
            
            </div>
        </div>
        
    </div>
    <div class="conds" style="display: none;">
       <div class="row">
            <div class="col-half">
                <div class="input-group">
                    <select name="labo" id="labo">
                        <option value="Aucun">Laboratoire</option>
                        @foreach($labos as $v)
                        <option value="{{$v->id}}">{{$v->labo}}</option>
                        @endforeach
                    </select>
                    <span class="labo"> 
                        <i class="far fa-plus-square"></i> 
                    </span>
                
                
                </div>
            </div>
             
        </div>
        <div class="row">
            <div class="col-half">
                <div class="input-group">
                    <select name="delegue" id="delegue">
                        <option value="0">Nom complet du Délégué</option>
                        @foreach($delegue as $v)
                        <option value="{{$v->id}}">{{$v->nom}}</option>
                        @endforeach
                    </select>
                    <span class="delegue"> 
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
    <h4 style="width: 100%; text-align: center;">En cas de difficultés contactez le service technique au 00237 698 711 769 </h4>
@php 
    session()->pull('inscription', session('inscription'));
    session()->pull('color', session('color'));
      
@endphp 
   
    <br><br>
        
   
    
    
    <script>
        let charge = document.querySelector('form #charge')
        let conds = document.querySelector('form .conds')
        charge.addEventListener('change', ()=>{
            if(charge.value == "Oui"){
                conds.style.display = "block"
            }else{
                conds.style.display = "none"
            }
        })
        
        /**open and grade speciality */
        let grade = document.querySelector('.containerform .grade')
        let close1 = document.querySelector('.modal1 span i')
        let modal1 = document.querySelector('.modal1')
        grade.addEventListener('click', ()=>{
            
            modal1.style.display = "flex"
        })

        close1.addEventListener('click', ()=>{
            modal1.style.display = "none"
        })
/* */
/**open and close speciality */
      /*  let specialite = document.querySelector('.containerform .specialite')
        let close2 = document.querySelector('.modal2 span i')
        let modal2 = document.querySelector('.modal2')
        specialite.addEventListener('click', ()=>{
           
            modal2.style.display = "flex"
        })
        close2.addEventListener('click', ()=>{
            modal2.style.display = "none"
        })*/
/** */
/** open laboratoire */
        /**open and close speciality */
        let laboratoires = document.querySelector('.containerform .labo')
        let close3 = document.querySelector('.modal3 span i')
        let modal3 = document.querySelector('.modal3')
        let containerlaboratoire = document.querySelector('#containerlaboratoire')
        laboratoires.addEventListener('click', ()=>{
           
            modal3.style.display = "flex"
             let y = window.scrollY
            if(screen.width <= 1000){
            	containerlaboratoire.style.marginTop = y+"px"
            }else{
            	containerlaboratoire.style.marginTop = y+"px"
            }
            
        })
        close3.addEventListener('click', ()=>{
            modal3.style.display = "none"
        })
/** */
/** open laboratoire */
        /**open and close speciality */
        let delegue = document.querySelector('.containerform .delegue')
        let close4 = document.querySelector('.modal4 span i')
        let modal4 = document.querySelector('.modal4')
        let containerdelegue = document.querySelector('#containerdelegue')
        delegue.addEventListener('click', ()=>{
           
            modal4.style.display = "flex"
             let y = window.scrollY
            if(screen.width <= 1000){
            	let top = new Number(y) + 350
            	containerdelegue.style.marginTop = top+"px"

            }else{
            	containerdelegue.style.marginTop = y+"px"
            }
        })
        close4.addEventListener('click', ()=>{
            modal4.style.display = "none"
        })
/** */
/**/
       let form = document.querySelector('.containerform form')
        form.addEventListener('submit', (e)=>{
         let select = document.querySelectorAll('form select')
            select.forEach(elt=>{
                if(elt.value=="choisir"){
                     e.preventDefault()
                     let inser = document.querySelector('.direction div')
                     let direction = document.querySelector('.direction')
                     direction.style.display = "flex"
                     let inf = ""
                     if(elt.id=="specialite"){
                        inf = "la spécialité"
                        elt.style.border = "1px solid #f0a500"
                        inser.innerHTML = "Remplir "+inf;
                     }else if(elt.id=="grade"){
                      inf = "le grade"
                      elt.style.border = "1px solid #f0a500"
                      inser.innerHTML = "Bien vouloir remplir tous les champs"
                     }else{
                        elt.style.border = "1px solid lightgray"
                     }
                 
                
                }


            })
             //on verifie s'il est pris en charge par un labo
            let prisCharge = document.querySelector('.containerform form #charge')
            if(prisCharge.value=="Oui"){
                let delegue = document.querySelector('.containerform form #delegue')
                let labo = document.querySelector('.containerform form #labo')
                if(labo.value == "Aucun"){
                    delegue.style.border = "1px solid #f0a500"
                    e.preventDefault();
                }else if(delegue.value == "Aucun"){
                    e.preventDefault();
                    labo.style.border = "1px solid #f0a500"
                }
            }
        })
        let formgrade = document.querySelector('.modal1 form')
            
            formgrade.addEventListener('submit', (e)=>{
                let grade = document.querySelector('.modal1 form #grade')
                let gradeC = document.querySelector('.containerform form #grade')
                e.preventDefault()
                let xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4){
                        let value = xhr.responseText
                       
                        let tab = value.split(';')
                        let donnee = tab[1].split('/')
                        gradeC.innerHTML =""
                        let option = document.createElement('option')
                        
                        option.value = donnee[0]
                        option.innerHTML = donnee[1]
                        gradeC.appendChild(option)
                        modal1.style.display = "none"
                    }
                    
                }
                var data = new FormData()
                data.append("titre", grade.value)
                data.append("_token", '{{csrf_token()}}')
                xhr.open("POST", "/grade")
                //data.append("login", login.value)
                //data.append("mot_de_passe", password.value)
                xhr.send(data)

            })
        let formspecialite = document.querySelector('.modal2 form')
        formspecialite.addEventListener('submit', (e)=>{
                let specialite = document.querySelector('.modal2 form #specialite')
                
                let specialiteC = document.querySelector('.containerform form #specialite')
                e.preventDefault()
                let xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4){
                        let value = xhr.responseText
                        
                        let tab = value.split(';')
                        let donnee = tab[1].split('/')
                        specialiteC.innerHTML =""
                        let option = document.createElement('option')
                        
                        option.value = donnee[0]
                        option.innerHTML = donnee[1]
                        specialiteC.appendChild(option)
                        modal2.style.display = "none"
                    }
                    
                }
                var data = new FormData()
                data.append("speciality", specialite.value)
                data.append("_token", '{{csrf_token()}}')
                xhr.open("POST", "/specialiste")
                //data.append("login", login.value)
                //data.append("mot_de_passe", password.value)
                xhr.send(data)

        })    
         let formslabo = document.querySelector('.modal3 form')
        formslabo.addEventListener('submit', (e)=>{
                let laboratoire = document.querySelector('.modal3 form #labo')
                
                let laboC = document.querySelector('.containerform form #labo')
                e.preventDefault()
                let xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4){
                        let value = xhr.responseText
                        
                        let tab = value.split(';')
                        let donnee = tab[1].split('/')
                        laboC.innerHTML =""
                        let option = document.createElement('option')
                        
                        option.value = donnee[0]
                        option.innerHTML = donnee[1]
                        laboC.appendChild(option)
                        modal3.style.display = "none"
                    }
                    
                }
                var data = new FormData()
                data.append("labo", laboratoire.value)
                data.append("_token", '{{csrf_token()}}')
                xhr.open("POST", "/laboratoire")
                //data.append("login", login.value)
                //data.append("mot_de_passe", password.value)
                xhr.send(data)

        })    

         let formsdelegue = document.querySelector('.modal4 form')
        formsdelegue.addEventListener('submit', (e)=>{
                let delegue = document.querySelector('.modal4 form #nom')
                
                let delegC = document.querySelector('.containerform form #delegue')
                e.preventDefault()
                let xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4){
                        let value = xhr.responseText
                        
                        let donnee = value.split(';')
                        delegC.innerHTML = ""
                        let option = document.createElement('option')
                        
                        option.value = donnee[0]
                        option.innerHTML = donnee[1]
                        delegC.appendChild(option)
                        modal4.style.display = "none"
                    }
                    
                }
                var data = new FormData()
                data.append("nom", delegue.value)
                data.append("_token", '{{csrf_token()}}')
                xhr.open("POST", "/delegue")
                //data.append("login", login.value)
                //data.append("mot_de_passe", password.value)
                xhr.send(data)

        })    
    </script>
    
</body>
</html>