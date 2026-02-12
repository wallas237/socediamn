@include('enteteadmin')


<div class="content mt-3">
    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong>Bienvenue dans ton tableau de bord </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br>
    <form method="POST" action="/list-abstract"  class="w-100  d-flex justify-content-center">
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
            <th scope="col">{{ "#" }}</th>
            <th scope="col">Surname</th>
            
            <th scope="col">Email Adress</th>
            <th scope="col">Phone</th>
            <th scope="col">Theme</th>
            <th scope="col">Confirm</th>
            
            </tr>
        </thead>
        <tbody>
                 @php 
                    $i=1;
                @endphp
                @foreach($inscript as $v )
            
            <tr>
                <th scope="row">{{$v->id}}</th>
                <th scope="row">{{$v->civilite." ".$v->name}}</th>
                <td>{{$v->email}}</td>
                <td>{{$v->telephone}}</td>
                <td>{{ $v->titre }}</td>
               
                <td> 
                    @if($v->confirmation_abstract == 1)
                       <button class="btn btn-success">Dejà Confirm</button> 
                    @else
                      {{-- <a href="/send-certificate/$v->id " target="_blank" >Envoyer</a> --}}
                      <a href="/confirm-abstract/{{ $v->id }}" target="_blank" onclick="confirm('Cliquer sur ok pour confirmer l'\abstract')" >Confirmer l'abstract</a>
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