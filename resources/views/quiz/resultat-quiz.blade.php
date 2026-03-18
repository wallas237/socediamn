<x-app-layout>
    @if (session('message'))
        <x-dialogue-alert color="{{ session('color') }}" message="{{ session('message') }}" />
    @endif

    @php
        $nbreQuiz = count($titre);
    @endphp
    @for ($i = 0; $i < $nbreQuiz; $i++)
        @php
            $touteLesQuestions = $allQuestion[$i];
            $reponsse = $allReponse[$i];
        @endphp

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex align-items-center justify-content-between">

                        <h6 class="m-0 font-weight-bold text-black-50">{{ $titre[$i]->titre }}</h6>

                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    @foreach ($touteLesQuestions as $q)
                                        <th scope="col">{{ $q->libelle_question }}</th>
                                    @endforeach
                                    <th>Commentaire Libre</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $count = count($allReponse[$i]);
                                    $nbreLigne = $count / 5;
                                   // $countCommentaire = $allCommentaire[$i];

                                @endphp
                                @for ($cpte = 0; $cpte < $nbreLigne; $cpte++)
                                    @php
                                        $offset = $cpte == 0 ? 0 : $cpte * 5;
                                        $reponses = DB::table('reponse_models')
                                            ->where('enquete_model_id', $titre[$i]->id)
                                            ->offset($offset)
                                            ->limit(5)
                                            ->get();
                                            $ligne = $cpte+1;
                                    @endphp
                                    <tr>
                                        <td>{{ $ligne }}</td>
                                        @foreach ($reponses as $value)
                                            <td>{{ $value->note }}</td>
                                        @endforeach
                                        @php
                                            $commentaireLibre = DB::table('reponse_commentaires')->where('created_at', $value->created_at)
                                                                                                   ->where('enquete_model_id', $titre[$i]->id)
                                                                                                 ->first();
                                        @endphp
                                        <td>{{ !empty($commentaireLibre) ? $commentaireLibre->reponse_commentaire_libre : "" }}</td>
                                    </tr>

                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endfor

</x-app-layout>
