<x-app-layout>
    <div class="container d-flex justify-content-center">
        <div class="card shadow mb-4 w-50">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Ajouter une session</h6>

                </div>

            </div>

            <div class="card-body">
                <section>
                   

                    
                        <form method="post" action="{{ route('ajouter.session') }}" class="mt-6 space-y-6">
                            @csrf
                            
                            <div class="p-3">
                                <x-input-label for="date_heure" class="form-check-label text-dark" :value="__('Date passage')" />
                                <x-text-input id="date_heure" name="date_heure" type="datetime-local" class="form-control bg-white  text-dark"
                                    :value="old('date_heure')" required autofocus autocomplete="date_heure" />
                                <x-input-error class="mt-2" :messages="$errors->get('date_heure')" />
                            </div>
                            <div class="p-3">
                                <x-input-label for="libelle_salle" class="form-check-label text-dark" :value="__('Libellé Salle')" />
                                <x-text-input id="libelle_salle" name="libelle_salle" type="text" class="form-control bg-white block text-dark"
                                    :value="old('libelle_salle')" autofocus autocomplete="libelle_salle" />
                                <x-input-error class="mt-2" :messages="$errors->get('libelle_salle')" />
                            </div>
                            

                            
                            <div class="p-3">
                                <x-input-label for="libelle_session" class="form-check-label text-dark" :value="__('Titre Session')" />
                                <textarea name="libelle_session" id="" cols="40" rows="15" class="form-control bg-white block text-dark"></textarea>
                                
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
                                <th scope="col">Libellé Salle</th>
                                <th scope="col">Date</th>
                                {{--  <th scope="col">Auteurs</th>
                                <th scope="col">Affiliation</th>  --}}



                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Session</th>
                                <th scope="col">Libellé Salle</th>
                                <th scope="col">Date</th>
                                {{--  <th scope="col">Auteurs</th>
                                <th scope="col">Affiliation</th>  --}}



                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $sessionSalle = DB::table('communication_salles')->get();
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
                                                <a class="dropdown-item" href="/update-session/{{ $v->id }}">
                                                    <button class="btn btn-warning p-2">
                                                        <i class="mdi mdi-pencil-box-outline"></i> Modifier Session </button>
                                                </a>
                                                
                                               
                                            </div>

                                        </div>



                                    </td>

                                    <th scope="row">{{ $v->libelle_session	 }}</th>
                                    <td>{{ $v->libelle_salle }}</td>
                                    <td>{{ $v->date_heure }}</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
