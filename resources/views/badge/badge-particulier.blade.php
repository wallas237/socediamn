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

                        <h6 class="m-0 font-weight-bold text-primary">Liste participants pré-inscrits</h6>
                        <button class="btn btn-success">
                            <a href="/imprimer-badge" class="text-white" target="_blank">Imp. Badge</a>
                        </button>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ '#' }}</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Given Name</th>
                                    {{--  <th scope="col">Specialist</th>  --}}
                                    <th scope="col">Category</th>
                                    <th scope="col">Email Adress</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Certificat</th>
                                    <th scope="col">Confirm</th>

                                </tr>
                            </thead>
                            <tfoot class="thead-light">
                                <tr>
                                    <th scope="col">{{ '#' }}</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Given Name</th>
                                    {{--  <th scope="col">Specialist</th>  --}}
                                    <th scope="col">Category</th>
                                    <th scope="col">Email Adress</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Certificat</th>
                                    <th scope="col">Confirm</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $i = 1;
                                    $inscrit = DB::table('inscriptions')->get();
                                @endphp
                                @foreach ($inscrit as $v)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <th scope="row">{{ $v->titre . ' ' . $v->name }}</th>
                                        <td>{{ $v->prenom }}</td>
                                        <td>
                                            @php
                                                $getGrade = DB::table('grades')->where('id', $v->grade)->first();
                                            @endphp
                                            {{ !empty($getGrade) ? $getGrade->titre : '' }}
                                        </td>
                                        {{--  <th>
                                        @php
                                            $getSpe = DB::table('specialites')
                                                ->where('id', $v->specialite)
                                                ->first();
                                            if (!empty($getSpe)) {
                                                echo $getSpe->speciality;
                                            }
                                        @endphp
                                    </th>  --}}
                                        <td>{{ $v->email }}</td>
                                        <td>{{ $v->telephone }}</td>


                                        <td>


                                            <div class="dropdown">
                                                <button class="btn btn-primary p-2 dropdown-toggle"
                                                    id="dropdownMenuIconButton7" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-account"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                                    <a class="dropdown-item"
                                                        href="/certificat-participation/{{ $v->id }}"
                                                        target="_blank">
                                                        <button class="btn btn-info p-2">
                                                            <i class="mdi mdi-file-pdf-box"></i> Visualisez certificat
                                                        </button>
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="/ajouter-attestation-service-rendu/{{ $v->id }}">
                                                        <button class="btn btn-warning p-2">
                                                            <i class="mdi mdi-account-convert"></i> Ajouter un libelle </button>
                                                    </a>
                                                    {{-- <a class="dropdown-item" href="/update-abstract/{{ $v->id }}">
                                                    <button class="btn btn-secondary p-2">
                                                        <i class="mdi mdi-account-convert"></i> Modifier Infos </button>
                                                </a>


                                                <a class="dropdown-item" href="/abstract-pdf/{{ $v->id }}" target="_blank">
                                                    <button class="btn btn-info p-2">
                                                        <i class="mdi mdi-file-pdf-box"></i> Imprimer </button>
                                                </a>
                                                 <a href="/word-abstract/{{ $v->id }}" class="dropdown-item"
                                                    ><button
                                                        class="btn btn-secondary p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Export Word' }}</button></a>
                                                </a> --}}
                                                    {{-- <a href="/visualiser-certificat-communication/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-success p-2">
                                                       {{ 'Visualiser Certificat communication ' }}</button></a>
                                                </a>
                                                <a href="/poster-communication-visualisation/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-primary p-2">
                                                       {{ 'Visualiser Communication Affichée' }}</button></a>
                                                </a> --}}
                                                    {{--  <a href="/oral-envoyer-certificat-communication/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-info p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Visualiser com Orale' }}</button></a>
                                                </a>  --}}
                                                    {{-- <a href="/conference-envoyer-certificat/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-warning p-2">
                                                      {{ 'Visualiser Conférence' }}</button></a>
                                                </a>
                                                <a href="/send-certificat-communication/{{ $v->id }}"
                                                    onclick="return confirm('Confirmer en cliquant sur ok ')"
                                                     class="dropdown-item"
                                                    ><button
                                                        class="btn btn-danger p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Envoyer communication Orale' }}</button></a>
                                                </a>
                                                <a href="/send-certificat-poster/{{ $v->id }}"
                                                    onclick="return confirm('Confirmer en cliquant sur ok ')"
                                                     class="dropdown-item"
                                                    ><button
                                                        class="btn btn-warning p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Envoyer communication affichée' }}</button></a>
                                                </a>
                                                <a href="/send-conference-certificat/{{ $v->id }}"
                                                    class="dropdown-item"
                                                   onclick="return confirm('Confirmer en cliquant sur ok ')" ><button
                                                        class="btn btn-info p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Envoyer les certificats de conference' }}</button></a>
                                                </a> --}}
                                                    {{--  <a href="/certificat-meilleur-presentation/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-danger p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Visualiser Meilleur Com Orale' }}</button></a>
                                                </a>
                                                <a href="/meilleur-poster-certificat-communication/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-primary p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Visualiser Meilleur Poster' }}</button></a>
                                                </a>  --}}
                                                    {{--  <a class="dropdown-item" href="/abstract-pdf/{{ $v->id }}" target="_blank">
                                                    <button class="btn btn-info p-2">
                                                        <i class="mdi mdi-file-pdf-box"></i> Imprimer </button>
                                                </a>

                                                <a class="dropdown-item" href="/word-abstract/{{ $v->id }}" target="_blank">
                                                    <button class="btn btn-danger p-2">
                                                        <i class="mdi mdi-file-word-box"></i> Télécharger Word </button>
                                                </a>  --}}

                                                </div>

                                            </div>




                                        </td>
                                        <td>
                                            <input type="checkbox" name="badge" id="{{ $v->id }}" />
                                        </td>

                                    </tr>

                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
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
                    xhr.open("POST", "/badge-liste")

                    xhr.send(data)
                } else {



                    data.append('id', elt.id)
                    data.append('action', 'del')
                    data.append("_token", token.value)
                    xhr.open("POST", "/badge-liste")

                    xhr.send(data)
                    elt.checked = false
                }


            })
        })
    </script>

</x-app-layout>
