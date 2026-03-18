<x-app-layout>
    @if (session('message'))
        <x-dialogue-alert color="{{ session('color') }}" message="{{ session('message') }}" />
    @endif


    <br>

    <br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des abstracts</h6>
                    <button class="btn btn-success">
                        <a href="/excel-abstract-export" class="text-white text-decoration-none">Exporter les abstracts
                            sur Excel</a>
                    </button>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Email Adress</th>
                                <th scope="col">Titre</th>
                                {{--  <th scope="col">Auteurs</th>
                                <th scope="col">Affiliation</th>  --}}



                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Email Adress</th>
                                <th scope="col">Titre</th>
                                {{--  <th scope="col">Auteurs</th>
                                <th scope="col">Affiliation</th>  --}}



                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $abstracts = DB::table('abstracts')->where('confirmation_abstract', 0)->get();
                            @endphp
                            @foreach ($abstracts as $v)
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary p-2 dropdown-toggle"
                                                id="dropdownMenuIconButton7" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-account"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">

                                                <a href="/confirm-abstract/{{ $v->id }}" class="dropdown-item"
                                                    onclick="return confirm('Cliquer sur ok pour confirmer l\'abstract')"><button
                                                        class="btn btn-success p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Confirmer Orale' }}</button></a>
                                                </a>
                                                <a href="/confirm-poster/{{ $v->id }}" class="dropdown-item"
                                                    onclick="return confirm('Cliquer sur ok pour confirmer le poster')"><button
                                                        class="btn btn-warning p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Confirmer Poster' }}</button></a>
                                                </a>
                                                <a href="/confirm-conference/{{ $v->id }}" class="dropdown-item"
                                                    onclick="return confirm('Cliquer sur ok pour confirmer la conférence')"><button
                                                        class="btn btn-secondary p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Confirmez Conférence' }}</button></a>
                                                </a>

                                                <a href="/abstract-rejete/{{ $v->id }}" class="dropdown-item"
                                                    onclick="return confirm('Cliquer sur ok pour confirmer le refus')"><button
                                                        class="btn btn-danger p-2">
                                                        <i
                                                            class="mdi mdi-alert-outline"></i>{{ 'Rejecter Abstract' }}</button></a>
                                                </a>
                                                <a href="/word-abstract/{{ $v->id }}" class="dropdown-item"
                                                    ><button
                                                        class="btn btn-secondary p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Export Word' }}</button></a>
                                                </a>

                                                <a class="dropdown-item" href="/abstract-pdf/{{ $v->id }}"
                                                    target="_blank">
                                                    <button class="btn btn-info p-2">
                                                        <i class="mdi mdi-file-pdf-box"></i> Imprimer </button>
                                                </a>
                                            </div>

                                        </div>



                                    </td>

                                    <th scope="row">{{ $v->civilite . ' ' . $v->name }}</th>
                                    <td>{{ $v->email }}</td>
                                    <td>{{ $v->titre }}</td>
                                    {{--  <td>{{ $v->auteurs }}</td>
                                    <td>{{ $v->affiliation }}</td>  --}}
                                    {{--  <td>{{ $v->introduction }}</td>
                                    <td>{{ $v->methode }}</td>
                                    <td>{{ $v->resultat }}</td>
                                    <td> {{ $v->conclusion }}</td>  --}}



                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @php

        if (session('compte')) {
            session()->pull('compte', session('compte'));
        }

        if (session('message')) {
            session()->pull('message', session('message'));
            session()->pull('color', session('color'));
        }

    @endphp
    <script>
        let libelleCompte = document.querySelector("#libelle_compte");
        let matriculeCompte = document.querySelector("#matricule_compte");
        //let token = document.querySelector('#token');
        getAllCompte(libelleCompte, matriculeCompte);
    </script>
</x-app-layout>
