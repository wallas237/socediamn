<x-app-layout>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-black-50">Liste des sessions</h6>
                    <a class="dropdown-item" href="/participant-non-inscrit-recu-gadget">
                        <button class="btn btn-warning p-2">
                            <i class="mdi mdi-pencil-box-outline"></i>Liste des participants non Inscrits reçu les gadgets</button>
                    </a>


                    <a class="dropdown-item" href="/participant-presence">
                        <button class="btn btn-success p-2">
                            <i class="mdi mdi-pencil-box-outline"></i> Télécharger liste de
                            présence au congrès </button>
                    </a>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Date</th>
                                <th scope="col">Session</th>
                                <th scope="col">Libellé Salle</th>





                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Date</th>
                                <th scope="col">Session</th>
                                <th scope="col">Libellé Salle</th>




                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $sessionSalle = DB::table('communication_salles')
                                    ->where('date_heure', '>=', '2025-07-30')
                                    ->orderBy('date_heure', 'asc')
                                    ->get();
                            @endphp
                            @foreach ($sessionSalle as $v)
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info p-2 dropdown-toggle"
                                                id="dropdownMenuIconButton7" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                                <a class="dropdown-item"
                                                    href="/telecharger-liste-presence/{{ $v->id }}">
                                                    <button class="btn btn-warning p-2">
                                                        <i class="mdi mdi-pencil-box-outline"></i> Télécharger liste de
                                                        présence </button>
                                                </a>


                                            </div>

                                        </div>



                                    </td>
                                    <td>{{ $v->date_heure }}</td>
                                    <th scope="row">{{ $v->libelle_session }}</th>
                                    <td>{{ $v->libelle_salle }}</td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
