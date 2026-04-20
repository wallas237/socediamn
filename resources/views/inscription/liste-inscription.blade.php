<x-app-layout>
    {{-- @if (session('message'))
        <x-dialogue-alert color="{{ session('color') }}" message="{{ session('message') }}" />
    @endif --}}
    @if (session('status'))
        <div class="alert alert-success d-flex align-items-center" role="alert">

            <div>
                {{ session('status') }}
            </div>
        </div>
    @endif


    <br>

    <br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des participants inscrits</h6>
                    <button class="btn btn-info">
                        <a href="{{ route('excel.liste.inscription') }}">Télécharger liste inscription validée Excel </a>
                    </button>
                    <button class="btn btn-warning">
                        <a href="/send-certificat-all-participation"
                            style="text-decoration: none; color: white;">Envoyez Attestation participation </a>
                    </button>


                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Nom & Prénom </th>
                                <th scope="col">Grade</th>
                                <th scope="col">Spécialité</th>

                                <th scope="col">Email Adress</th>
                                <th scope="col">Phone </th>
                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Nom & Prénom </th>
                                <th scope="col">Grade</th>
                                <th scope="col">Spécialité</th>

                                <th scope="col">Email Adress</th>
                                <th scope="col">Phone </th>
                                <th scope="col">Actions</th>

                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $inscript = DB::table('inscriptions')->where('confirmation_inscription', 1)->get();
                            @endphp
                            @foreach ($inscript as $v)
                                <tr>

                                    <th scope="row">{{ $v->titre . ' ' . $v->name . ' ' . $v->prenom }}</th>
                                    <td>
                                        @php
                                            $grade = DB::table('grades')->where('id', $v->grade)->first();
                                            $specialiste = DB::table('specialites')
                                                ->where('id', $v->specialite)
                                                ->first();
                                        @endphp
                                        {{ !empty($grade) ? $grade->titre : '' }}
                                    </td>
                                    <th>{{ !empty($specialiste) ? $specialiste->speciality : 'Non définie' }}</th>

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
                                                <a class="dropdown-item" href="/update-inscription/{{ $v->id }}">
                                                    <button class="btn btn-warning p-2">
                                                        <i class="mdi mdi-account-convert"></i> Modifier Infos </button>
                                                </a>
                                                 <a class="dropdown-item" href="/send-congres-participation/{{ $v->id }}"
                                                    onclick="return Confirm('Merci de confirmer l\'envoi du certificat de participation')">
                                                    <button class="btn btn-success p-2">
                                                        <i class="mdi mdi-email-outline"></i> Envoyer certificat
                                                    </button>
                                                </a>
                                                <a class="dropdown-item" href="/lettre-invitation/{{ $v->id }}"
                                                    target="_blank">
                                                    <button class="btn btn-success p-2">
                                                        <i class="mdi mdi-email-outline"></i> Voir lettre Invitation
                                                    </button>
                                                </a>
                                                <a href="/envoyez-lettre-invitation/{{ $v->id }}"
                                                    style="text-decoration: none; color: white;">
                                                    <button class="btn btn-primary p-2">
                                                        <i class="mdi mdi-email-outline"></i>
                                                        Envoyez lettre
                                                        d'invitation
                                                    </button>
                                                </a>
                                            </div>

                                        </div>
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
