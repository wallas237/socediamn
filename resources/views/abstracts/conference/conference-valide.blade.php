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

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des conférences Validées</h6>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Type</th>
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
                                <th scope="col">Type</th>
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
                                $abstracts = DB::table('abstracts')->where('type_abstract', "Conférence")->where('confirmation_abstract', 1)->get();
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
                                                 <a class="dropdown-item"
                                                    href="/conference-envoyer-certificat/{{ $v->id }}"
                                                    target="_blank">
                                                    <button class="btn btn-info p-2">
                                                        <i class="mdi mdi-file-pdf-box"></i> Visualisez conference
                                                    </button>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="/send-conference-certificat/{{ $v->id }}"
                                                    onclick="return confirm('Confirmez si vous souhaitez envoyez cette attestation')">
                                                    <button class="btn btn-success p-2">
                                                        <i class="mdi mdi-account-convert"></i> Envoyez
                                                        attestation conference </button>
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
                                    <th scope="row">{{ $v->type_abstract }}</th>
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

    <br>

    <br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-between justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des communications Validées</h6>
                     <a class="dropdown-item" href="/envoyez-communication-email" >
                                                    <button class="btn btn-success p-2">
                                                        Envoyer Mail </button>
                                                </a>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                               <th scope="col">Surname</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Email Adress</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                                <th scope="col">Surname</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Email Adress</th>

                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $comValide = DB::table('com_orale_valides')->get();
                            @endphp
                            @foreach ($comValide as $v)
                                <tr>

                                    <th scope="row">{{ $v->nom }}</th>
                                    <th scope="row">{{ $v->titre}}</th>
                                    <td>{{ $v->email }}</td>




                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>

    <br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-between justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des communications affichées Validées</h6>
                     <a class="dropdown-item" href="/envoyez-affiche-email" >
                                                    <button class="btn btn-success p-2">
                                                        Envoyer Mail </button>
                                                </a>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                               <th scope="col">Surname</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Email Adress</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                                <th scope="col">Surname</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Email Adress</th>

                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $comValide = DB::table('poster_valides')->get();
                            @endphp
                            @foreach ($comValide as $v)
                                <tr>

                                    <th scope="row">{{ $v->nom }}</th>
                                    <th scope="row">{{ $v->titre}}</th>
                                    <td>{{ $v->email }}</td>




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
