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

                    <h6 class="m-0 font-weight-bold text-black-50">Ajouter une session</h6>

                </div>

            </div>

            <div class="card-body">
                <section>



                    <form method="post" action="{{ route('ajouter.titre') }}" class="mt-6 space-y-6">
                        @csrf

                        {{-- <div class="p-3">
                                <x-input-label for="date_heure" class="form-check-label text-dark" :value="__('Date passage')" />
                                <x-text-input id="date_heure" name="date_heure" type="datetime-local" class="form-control bg-white  text-dark"
                                    :value="old('date_heure')" required autofocus autocomplete="date_heure" />
                                <x-input-error class="mt-2" :messages="$errors->get('date_heure')" />
                            </div> --}}
                        <div class="p-3">
                            <x-input-label for="titre_enquete" class="form-check-label text-dark" :value="__('Ajouter une session')" />
                            <x-text-input id="titre_enquete" name="titre_enquete" type="text"
                                class="form-control bg-white block text-dark" :value="old('titre_enquete')" autofocus
                                autocomplete="titre_enquete" />
                            <x-input-error class="mt-2" :messages="$errors->get('titre_enquete')" />
                        </div>



                        {{-- <div class="p-3">
                                <x-input-label for="libelle_session" class="form-check-label text-dark" :value="__('Titre Session')" />
                                <textarea name="libelle_session" id="" cols="40" rows="15" class="form-control bg-white block text-dark"></textarea>

                            </div> --}}

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
                                {{-- <th scope="col">Libellé Salle</th>
                                <th scope="col">Date</th> --}}
                                {{--  <th scope="col">Auteurs</th>
                                <th scope="col">Affiliation</th>  --}}



                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Session</th>
                                {{-- <th scope="col">Libellé Salle</th>
                                <th scope="col">Date</th> --}}
                                {{--  <th scope="col">Auteurs</th>
                                <th scope="col">Affiliation</th>  --}}



                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $sessionSalle = DB::table('enquete_models')->get();
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
                                                <a class="dropdown-item" href="/creer-question/{{ $v->id }}">
                                                    <button class="btn btn-info p-2">
                                                        <i class="mdi mdi-pencil-box-outline"></i> Ajouter une Question
                                                    </button>
                                                </a>


                                            </div>

                                        </div>



                                    </td>


                                    <th scope="row">{{ $v->titre_enquete }}</td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
