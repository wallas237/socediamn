@include('enteteadmin')


<div class="content mt-3">
    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong>Bienvenue dans ton tableau de bord </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br>
    <form method="POST" action="/list-inscription"  class="w-100  d-flex justify-content-center">
        @csrf
        <div class="input-group w-50 justify-content-center">
            <div class="form-outline  w-50">
                <input type="search" name="name" id="form1"  class="form-control" />
                
            </div>
            <button  type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>     
 
    <br><br>
    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Surname</th>
            <th scope="col">Given Name</th>
            <th scope="col">Specialist</th>
            <th scope="col">Category</th>
            <th scope="col">Email Adress</th>
            <th scope="col">Phone</th>
            <th scope="col">Certificat</th>
            <th scope="col">Confirm</th>
            
            </tr>
        </thead>
        <tbody>
                 @php 
                    $i=1;
                @endphp
                @foreach($inscript as $k => $v )
            
            <tr>
                <th scope="row">{{$i}}</th>
                <th scope="row">{{$v->titre." ".$v->name}}</th>
                <td>{{$v->prenom}}</td>
                <td>
                   @php 
                    $getGrade = DB::table('grades')->where('id', $v->grade)->first();
                   @endphp
                {{ !empty($getGrade) ? $getGrade->titre : ""}}
            </td>
                <th>
                @php 
                    $getSpe = DB::table('specialites')->where('id', $v->specialite)->first();
                    if(!empty($getSpe)){
                        echo  $getSpe->speciality;
                    }
                   @endphp
               </th>
                <td>{{$v->email}}</td>
                <td>{{$v->telephone}}</td>
               
               
                <td> 
                    @if($v->confirmation_inscription == 1)
                       <button class="btn btn-success">Dejà Confirm</button> 
                    @else
                      {{-- <a href="/send-certificate/$v->id " target="_blank" >Envoyer</a> --}}
                      <a href="/confirm-inscription/{{ $v->id }}" target="_blank" onclick="confirm('Voulez-vous valider son inscription')" >Confirmer le paiement</a>
                    @endif    
                </td>
                <td></td>
               
                </tr>
                
            </tr>
                 @php 
                    $i++;
                @endphp
                @endforeach
          
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>

     {{$inscript->links()}}
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>  
    
</div>
<script type="text/javascript">
    let confirmation = document.querySelectorAll('td input')
    confirmation.forEach(elt=>{
        elt.addEventListener('click', (e)=>{

            let conf = confirm('En cochant vous confirmez le paiement de son inscription')
            if(conf == true){
               elt.checked = true
              
                let data = new FormData()
                let xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4){
                       
                      document.location.reload();
                      
                    }
                }

                data.append('id', elt.id)
                data.append("_token", '{{csrf_token()}}')
                xhr.open("POST", "/confirm-inscription")
                
                xhr.send(data)
            }else{
                elt.checked = false
            }

            
        })
    })
    
    
</script>

@include('footeradmin')