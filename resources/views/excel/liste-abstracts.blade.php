<h2>Liste des Communications orales </h2>

<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">{{ "Civilité" }}</th>
            <th scope="col">{{ "Nom et Prénom" }}</th>
             <th scope="col">Pays</th>
            <th scope="col">email</th>
            <th scope="col">Titre</th>
            <th scope="col">jour de passage</th>
            <th scope="col">Heure</th>
            {{-- <th scope="col">Affiliation</th>
            <th scope="col">Auteurs</th>
            <th scope="col">Mots clés</th>
            <th scope="col">Introduction</th>
            <th scope="col">Méthodes</th>
            <th scope="col">Résultats</th>
            <th scope="col">Conclusion</th> --}}

        </tr>
    </thead>

    @php

    @endphp
    <tbody>

        @foreach ($orales as $v)
            @php
                $abs = DB::table('abstracts')->where('email', $v->email)->first();
            @endphp
            <tr>
                <th>{{ !empty($abs) ? $abs->civilite : "Dr" }}</th>
                <th>{{ $v->nom }}</th>
                <td>{{ !empty($abs) ? $abs->pays : "Non défini" }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->titre }}</td>
                <td>{{ $v->date }}</td>
                <td>{{ $v->heure }}</td>
                {{-- <td>{{ $v->mot_cle }}</td>
                <td>{{ $v->introduction }}</td>
                <td>{{ $v->methode }}</td>
                <td>{{ $v->resultat }}</td>
                <td>{{ $v->conclusion }}</td> --}}

            </tr>
        @endforeach

    </tbody>
</table>
