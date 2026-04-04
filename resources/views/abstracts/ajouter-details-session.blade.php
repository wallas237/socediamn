<x-app-layout>
    <div class="container d-flex justify-content-center">
        <div class="card shadow mb-4 w-50">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Ajouter une session</h6>

                </div>

            </div>
            @php
                $communicationSalle = DB::table('communication_salles')->where('id', $idSession)->first();
            @endphp
            <div class="card-body">
                <section>



                    <form method="post" action="{{ route('ajouter.details', ['idSession' => $idSession]) }}"
                        class="mt-6 space-y-6">
                        @csrf

                        <div class="pt-3">
                            <x-input-label for="communication_salle_id" class="form-check-label text-dark"
                                :value="__('Titre Session')" />
                            <select name="communication_salle_id" id="communication_salle_id"
                                class="form-control bg-white block text-dark">
                                <option value="{{ $communicationSalle->id }}">{{ $communicationSalle->libelle_session }}
                                </option>
                            </select>
                        </div>
                        <div class="pt-3">
                            <x-input-label for="libelle_detail_session" class="form-check-label text-dark"
                                :value="__('Titre Détail Session')" />
                            <textarea name="libelle_detail_session" id="" cols="40" rows="15"
                                class="form-control bg-white block text-dark"></textarea>

                        </div>
                        <div class="pt-3">
                            <x-input-label for="orateur" class="form-check-label text-dark" :value="__('Orateur')" />
                            <x-text-input id="orateur" name="orateur" type="text"
                                class="form-control bg-white block text-dark" :value="old('orateur')" autofocus
                                autocomplete="orateur" />
                            <x-input-error class="mt-2" :messages="$errors->get('orateur')" />
                        </div>
                        <div class="pt-3">
                            <x-input-label for="libelle_salle" class="form-check-label text-dark" :value="__('Libellé Salle')" />
                            <x-text-input id="libelle_salle" name="libelle_salle" type="text"
                                class="form-control bg-white block text-dark" :value="old('libelle_salle')" autofocus
                                autocomplete="libelle_salle" />
                            <x-input-error class="mt-2" :messages="$errors->get('libelle_salle')" />
                        </div>





                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="btn btn-primary py-2">Enregistrer</button>
                        </div>
                    </form>

                </section>
            </div>
        </div>
    </div>

    <br>

    <br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des sessions</h6>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Session</th>
                                <th scope="col">Détails</th>
                                <th scope="col">Orateur</th>
                                <th scope="col">Salle</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Session</th>
                                <th scope="col">Détails</th>
                                <th scope="col">Orateur</th>
                                <th scope="col">Salle</th>
                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $sessionSalle = DB::table('ajouter_detail_sessions')->get();
                            @endphp
                            @foreach ($sessionSalle as $v)
                                @php
                                    $comSalle = DB::table('communication_salles')
                                        ->where('id', $idSession)
                                        ->first();
                                @endphp
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info p-2 dropdown-toggle"
                                                id="dropdownMenuIconButton7" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                               
                                                <a class="dropdown-item" href="/update-details/{{ $v->id }}">
                                                    <button class="btn btn-info p-2">
                                                        <i class="mdi mdi-pencil-box-outline"></i>Modifier Détails
                                                        Session
                                                    </button>
                                                </a>


                                            </div>

                                        </div>



                                    </td>
                                    <th scope="row">{{ $comSalle->libelle_session }}</th>
                                    <th scope="row">{{ $v->libelle_detail_session }}</th>
                                    <th>{{ $v->orateur }}</th>
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
