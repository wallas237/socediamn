@include('enteteadmin')


<div class="content mt-3">
    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong>Bienvenue dans ton tableau de bord</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br>
    <form method="POST" action="/liste-categorie" class="w-100  d-flex justify-content-center">
        @csrf
        <div class="input-group w-50 justify-content-center">
            <div class="form-outline  w-50">
               <select name="speciality" class="form-outline  w-100 h-100">
                   <option value="Choisir">Choisir</option>
                   @php 
                        $speciality = DB::table('specialites')->orderBy('speciality', 'asc')->get();
                   @endphp
                   @foreach($speciality as $v)
                    <option value="{{$v->id}}">{{$v->speciality}}</option>
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
            <th scope="col">Badge</th>
           
            
            </tr>
        </thead>
        <tbody>
                @php 
                    $i=1;
                @endphp
                @foreach($inscription as $v )
            
            <tr>
                <th scope="row">{{$i}}</th>
                <th scope="row">{{$v->titre." ".$v->name}}</th>
                <td>{{$v->prenom}}</td>
                <td>
                   @php 
                    $getGrade = DB::table('grades')->where('id', $v->grade)->first();
                   @endphp
                   @if(!empty($getGrade))
                {{$getGrade->titre}}
                @endif
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
                    <a href="/creer-badge/{{ $v->specialite }}" target="_blank">Cliquer</a>
                 </td>
               
                
            </tr>
                @php 
                    $i++;
                @endphp
                @endforeach
          
        </tbody>
    </table>
   

    
</div>


@include('footeradmin')