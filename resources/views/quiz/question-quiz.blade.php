<x-app-layout>
    @if(session('status'))
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

                    <h6 class="m-0 font-weight-bold text-black-50">Ajouter une Question à la session
                        "{{ $sessions->titre_enquete }}"</h6>

                </div>

            </div>

            <div class="card-body">
                <section>



                    <form method="post" action="{{ route('ajouter.question', ['idTitre' => $sessions->id]) }}"
                        class="mt-6 space-y-6">
                        @csrf



                        <div class="p-3">
                            <x-input-label for="libelle_question" class="form-check-label text-dark"
                                :value="__('Libelle Question')" />
                            <textarea name="libelle_question" id="libelle_question" cols="40" rows="15"
                                class="form-control bg-white block text-dark"></textarea>

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
                                <th scope="col">Libelle question</th>
                                {{-- <th scope="col">Date</th> --}}
                                {{--  <th scope="col">Auteurs</th>
                                <th scope="col">Affiliation</th>  --}}



                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Session</th>
                                <th scope="col">Libelle question</th>
                                {{-- <th scope="col">Date</th> --}}
                                {{--  <th scope="col">Auteurs</th>
                                <th scope="col">Affiliation</th>  --}}



                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $sessionSalle = DB::table('question_models')
                                    ->join(
                                        'enquete_models',
                                        'question_models.enquete_model_id',
                                        '=',
                                        'enquete_models.id',
                                    )
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
                                                {{-- <a class="dropdown-item" href="/update-session/{{ $v->id }}">
                                                    <button class="btn btn-warning p-2">
                                                        <i class="mdi mdi-pencil-box-outline"></i> Modifier Session </button>
                                                </a> --}}


                                            </div>

                                        </div>



                                    </td>
                                    <td>{{ $v->titre_enquete }}</td>
                                    <th scope="row">{{ $v->libelle_question }}</th>

                                    {{-- <td>{{ $v->date_heure }}</td> --}}

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
