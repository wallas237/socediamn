<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $inscript->civilite . ' ' . $inscript->name }}</title>
</head>

<body>
    <div class="titre">
        <h3>Titre</h3>
        <h4>{{ $inscript->titre }}</h4>
    </div>
    <div class="affiliation">
        <h3>Affiliations</h3>
        @php
            $tableauAffiliation = [];
            $affiliation = explode(';', $inscript->affiliation);
            $affiliation2 = explode('/', $inscript->affiliation);
        @endphp
        @if (count($affiliation) > 1)
            @php
                $tableauAffiliation = $affiliation;
            @endphp
        @elseif(count($affiliation2) > 1)
            @php
                $tableauAffiliation = $affiliation2;
            @endphp
        @elseif(count($affiliation) == 1 && count($affiliation2) == 1)
            @php
                $tableauAffiliation = $affiliation;
            @endphp
        @else
            @php
                $tableauAffiliation = $affiliation;
            @endphp
        @endif
        <ul>
            @for ($i = 0; $i < count($tableauAffiliation); $i++)
                <li>{{ $tableauAffiliation[$i] }}</li>
            @endfor
        </ul>
    </div>
    <div class="auteur">
        <h3>Auteurs</h3>
        @php
            $tableauAuteur = [];
            $auteurs = explode(';', $inscript->auteurs);
            $auteurs2 = explode('/', $inscript->auteurs);
            $auteurs3 = explode('(;)', $inscript->auteurs);
            $auteurs4 = explode('(/)', $inscript->auteurs);

            if (count($auteurs) > 1 && count($auteurs3) == 1) {
                $tableauAuteur = $auteurs;
            } elseif (count($auteurs) >= 1 && count($auteurs3) > 1) {
                $tableauAuteur = $auteurs3;
            } elseif (count($auteurs2) > 1 && count($auteurs4) == 1) {
                $tableauAuteur = $auteurs2;
            } elseif (count($auteurs2) >= 1 && count($auteurs4) > 1) {
                $tableauAuteur = $auteurs4;
            } elseif (count($auteurs) == 1 && count($auteurs2) == 1) {
                $tableauAuteur = $auteurs;
            } else {
                $tableauAuteur = $auteurs2;
            }
        @endphp
        

        @for ($i = 0; $i < count($tableauAuteur); $i++)
            <em>{{ $tableauAuteur[$i] }} </em>;
        @endfor

    </div>
    <div class="introduction">
        <h3>Introduction</h3>
        <p>{{ $inscript->introduction }}</p>
    </div>
    <div class="medthode">
        <h3>Méthodes</h3>
        <p>{{ $inscript->methode }}</p>
    </div>
    <div class="resultat">
        <h3>Résultats</h3>
        <p>{{ $inscript->resultat }}</p>
    </div>
    <div class="conclusion">
        <h3>Conclusion</h3>
        <p>{{ $inscript->conclusion }}</p>
    </div>
</body>

</html>
