<x-app-layout>


<div class="container-fluid mt-3">
    {{--  <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong>Bienvenue dans ton tableau de bord </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>  --}}
    <br>
    {{--  <form method="POST" action="/list-inscription" class="w-100  d-flex justify-content-center">
        @csrf
        <div class="input-group w-50 justify-content-center">
            <div class="form-outline  w-50">
                <input type="search" name="name" id="form1" class="form-control" />

            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>  --}}

    <br><br>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-primary">Liste participants Afa Respir</h6>
                    <button class="btn btn-success">
                        <a href="/imprimer-afa-respir-badge" class="text-white" target="_blank">Imp. Badge</a>
                    </button>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ "#" }}</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Given Name</th>
                                {{--  <th scope="col">Specialist</th>  --}}
                                <th scope="col">Category</th>
                                <th scope="col">Email Adress</th>
                                <th scope="col">Phone</th>
                                {{--  <th scope="col">Certificat</th>  --}}
                                <th scope="col">Confirm</th>

                            </tr>
                        </thead>
                        <tfoot class="thead-light">
                            <tr>
                                <th scope="col">{{ "#" }}</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Given Name</th>
                                {{--  <th scope="col">Specialist</th>  --}}
                                <th scope="col">Category</th>
                                <th scope="col">Email Adress</th>
                                <th scope="col">Phone</th>
                                {{--  <th scope="col">Certificat</th>  --}}
                                <th scope="col">Confirm</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($inscrit as $v)
                                <tr>
                                    <th scope="row">{{ $v->id }}</th>
                                    <th scope="row">{{ $v->titre . ' ' . $v->name }}</th>
                                    <td>{{ $v->prenom }}</td>
                                    <td>
                                       {{ $v->qualite }}
                                    </td>
                                    <td>{{ $v->email }}</td>
                                    <td>{{ $v->pays }}</td>


                                    {{--  <td>
                                        @if ($v->confirmation_inscription == 1)
                                            <button class="btn btn-success">Dejà Confirm</button>
                                        @else
                                            {{-- <a href="/send-certificate/$v->id " target="_blank" >Envoyer</a> --}}
                                            {{--  <a href="/confirm-inscription/{{ $v->id }}" target="_blank"  --}}
                                                {{--  onclick="confirm('Voulez-vous valider son inscription')">Confirmer le  --}}
                                                {{--  paiement</a>
                                        @endif
                                    </td>  --}}
                                    <td>
                                        <input type="checkbox" name="badge" id="{{ $v->id }}" />
                                    </td>

                                </tr>

                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<script type="text/javascript">
    let confirmation = document.querySelectorAll('td input')
    let token = document.querySelector('#tocken')
    confirmation.forEach(elt => {
        elt.addEventListener('click', (e) => {
            let data = new FormData()
            let xhr = new XMLHttpRequest()
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {

                   // document.location.reload();

                }
            }

            if (elt.checked == true) {
                // console.log(elt.id+" add");


                 data.append('id', elt.id)
                 data.append('action', 'add')
                 data.append("_token", token.value)
                 xhr.open("POST", "/badge-afa-respir-liste")

                 xhr.send(data)
             } else {



                 data.append('id', elt.id)
                 data.append('action', 'del')
                 data.append("_token", token.value)
                 xhr.open("POST", "/badge-afa-respir-liste")

                 xhr.send(data)
                 elt.checked = false
             }


        })
    })
</script>

</x-app-layout>
