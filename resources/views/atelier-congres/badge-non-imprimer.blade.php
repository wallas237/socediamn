<x-app-layout>



    <br>

    <br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des inscrits aux ateliers qui n'ont pas de badges </h6>
                     <button class="btn btn-success">
                        <a href="/badge-atelier-participant" class="text-white" target="_blank">Imp. Badge</a>
                    </button>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                {{-- <th scope="col">Statut</th> --}}
                                <th scope="col">Nom & Prénom</th>
                                <th scope="col">Email Adress</th>
                                <th scope="col">Spécialité</th>
                                <th scope="col">Echographie Thoracique</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Spirométrie</th>
                                <th scope="col">Montant</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                {{-- <th scope="col">Statut</th> --}}
                                <th scope="col">Nom & Prénom</th>
                                <th scope="col">Email Adress</th>
                                <th scope="col">Spécialité</th>
                                <th scope="col">Echographie Thoracique</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Spirométrie</th>
                                <th scope="col">Montant</th>
                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $atelierScps = DB::table('atelier_saplf_scps')
                                    ->where('confirmation_paiement', 1)
                                    ->where('badge', 0)
                                    ->get();
                            @endphp
                            @foreach ($atelierScps as $v)
                                @php
                                    $specialiste = DB::table('specialites')->where('id', $v->specialite)->first();
                                @endphp
                                <tr>
                                    {{-- <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary p-2 dropdown-toggle"
                                                id="dropdownMenuIconButton7" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-account"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">


                                                <a href="/confirm-inscription-atelier/{{ $v->id }}"
                                                    class="dropdown-item"
                                                    onclick="return confirm('Cliquer sur ok pour confirmer cette inscription')"><button
                                                        class="btn btn-warning p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Confirmer Inscription' }}</button></a>
                                                </a>

                                                <a href="/confirm-abstract/{{ $v->id }}" class="dropdown-item"
                                                    onclick="return confirm('Cliquer sur ok pour confirmer l\'abstract')"><button
                                                        class="btn btn-danger p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Delete' }}</button></a>
                                                </a>

                                            </div>

                                        </div>



                                    </td> --}}

                                    <th scope="row">{{ $v->titre . ' ' . $v->name . ' ' . $v->prenom }}</th>
                                    <td>{{ $v->email }}</td>
                                    <td>{{ !empty($specialiste) ? $specialiste->speciality : '' }}</td>
                                    <td>{{ $v->atelier_pre_1 }}</td>
                                    <td>{{ $v->prix_atelier_1 }}</td>
                                    <td>{{ $v->atelier_pre_2 }}</td>
                                    <td>{{ $v->prix_atelier_2 }}</td>




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
