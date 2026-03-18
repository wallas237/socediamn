@include('enteteadmin')


<div class="content mt-3">
    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong>Bienvenue dans ton tableau de bord </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br>
    <form method="POST" class="w-100  d-flex justify-content-center">
        @csrf
        <div class="input-group w-50 justify-content-center">
            <div class="form-outline  w-50">
                <input type="search" id="form1" class="form-control" />

            </div>
            <button type="button" class="btn btn-primary">
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
                <th scope="col">Laboratoire</th>
                <th scope="col">Email Adress</th>



            </tr>
        </thead>
        <tbody>

            @foreach ($inscript as $k => $v)
                <tr>
                    <th scope="row">{{ $v->id }}</th>
                    <th scope="row">{{ $v->titre . ' ' . $v->nom }}</th>

                    <td>
                        @php
                            $labo = DB::table('laboratoires')
                                ->where('id', $v->labo_id)
                                ->first();
                        @endphp
                        @if (!empty($labo))
                            {{ $labo->labo }}
                        @endif
                    </td>

                    <td>{{ $v->email }}</td>



                </tr>

                </tr>
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

            {{ $inscript->links() }}
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
    confirmation.forEach(elt => {
        elt.addEventListener('click', (e) => {

            let conf = confirm('En cochant vous confirmez le paiement de son inscription')
            if (conf == true) {
                elt.checked = true

                let data = new FormData()
                let xhr = new XMLHttpRequest()
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {

                        document.location.reload();

                    }
                }

                data.append('id', elt.id)
                data.append("_token", '{{ csrf_token() }}')
                xhr.open("POST", "/confirm-inscription")

                xhr.send(data)
            } else {
                elt.checked = false
            }


        })
    })
</script>

@include('footeradmin')
