<x-app-layout>
    @if (session('status'))
        <div class="alert alert-success d-flex align-items-center" role="alert">

            <div>
                {{ session('status') }}
            </div>
        </div>
    @endif
    <div class="container d-flex justify-content-center">
        <div class="card shadow mb-4 w-50">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50"></h6>

                </div>

            </div>

            <div class="card-body">
                <section>



                    <form method="post" action="{{ route('ajouter.attestation.service.rendu', ['id' => $id]) }}"
                        class="mt-6 space-y-6">
                        @csrf



                        <div class="p-3">
                            <x-input-label for="certificat" class="form-check-label text-dark" :value="__('Type certificat')" />
                            <select name="certificat" class="form-select" id="">
                                <option value="">Choisir</option>
                                <option value="table-ronde">Table ronde</option>
                                <option value="atelier">Atelier</option>
                                <option value="moderateur-pleniere">Modérateur pleniere</option>
                                <option value="moderateur-session">Modérateur-session</option>
                                <option value="moderateur-communication-affichée">Modérateur-communication affichée</option>
                                <option value="moderateur-symposium">Modérateur-symposium</option>
                                <option value="rapporteur-pleniere">Rapporteur pleniere</option>
                                <option value="rapporteur-session">Rapporteur session</option>
                                <option value="rapporteur-symposium">Rapporteur Symposium</option>
                            </select>

                        </div>
                        <div class="p-3">
                            <x-input-label for="libelle" class="form-check-label text-dark" :value="__('libelle')" />
                            <textarea name="libelle" id="libelle" cols="40" rows="15" class="form-control bg-white block text-dark"></textarea>

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
                                <th scope="col">Participant</th>
                                <th scope="col">email</th>
                                <th scope="col">type session</th>
                                <th scope="col">Titre</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                               <th scope="col">Statut</th>
                                <th scope="col">Participant</th>
                                <th scope="col">email</th>
                                <th scope="col">type session</th>
                                <th scope="col">Titre</th>
                            </tr>
                        </tfoot>
                        @php
                            $sessions = DB::table('service_rendus')
                                    ->join('inscriptions', 'service_rendus.inscription_id', '=', 'inscriptions.id')
                                    ->select('service_rendus.*', 'inscriptions.email', 'inscriptions.name', 'inscriptions.prenom')
                                    ->get();
                        @endphp
                        <tbody>
                            @foreach ($sessions as $s)
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
                                                    href="/visualiser-service-rendu/{{ $s->id }}"
                                                    target="_blank">
                                                    <button class="btn btn-info p-2">
                                                        <i class="mdi mdi-file-pdf-box"></i> Visualisez certificat
                                                    </button>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="/envoi-certificat-service-rendu/{{ $s->id }}"
                                                    onclick="return confirm('Confirmez si vous souhaitez envoyez cette attestation')">
                                                    <button class="btn btn-success p-2">
                                                        <i class="mdi mdi-account-convert"></i> Envoyez
                                                        certificat </button>
                                                </a>

                                            </div>

                                        </div>



                                    </td>
                                    <td>{{ $s->name." ".$s->prenom }}</td>
                                    <td>{{ $s->email }}</td>
                                    <td>{{ $s->certificat }}</td>

                                    <td>{{ $s->libelle }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
