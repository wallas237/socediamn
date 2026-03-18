@include('enteteadmin')


<div class="content mt-3">
    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong>Bienvenue dans ton tableau de bord</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br>
    <form method="POST" action="" class="w-100  d-flex justify-content-center">
        @csrf
        <div class="input-group w-50 justify-content-center">
            <div class="form-outline  w-50">
               <select name="labo" class="form-outline  w-100 h-100">
                   <option value="Choisir">Choisir</option>
                   @foreach($labo as $k=>$v)
                    <option value="{{$v->id}}">{{$v->labo}}</option>
                   @endforeach
               </select>
                
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
            <th scope="col">Grade</th>
            <th scope="col">Speciality</th>
            <th scope="col">Email Adress</th>
            <th scope="col">Labo</th>
            <th scope="col">Facture</th>
            
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
                {{$getGrade->titre}}
            </td>
                <th>
                @php 
                    $getSpe = DB::table('specialites')->where('id', $v->specialite)->first();
                    if(!empty($getSpe)){
                        echo $getSpe->speciality;
                    }
                   @endphp
                </th>
                <td>{{$v->email}}</td>
                <td>
                     @php 
                    $getLabo = DB::table('laboratoires')->where('id', $v->labo)->first();
                    if(!empty($getLabo)){
                        echo $getLabo->labo;
                    }
                   @endphp
                  
                </td>
                <td> 
                   <a href="/facture-laboratoire/{{ $v->labo }}">Réçu</a>
                </td>
                <!--<td><button type="button" class="btn btn-danger"><a style="text-decoration: none; color: white;" href="/delete-article/{{$v->id}}"> <i class="far fa-trash-alt"></i></a> Delete</button></td>-->
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