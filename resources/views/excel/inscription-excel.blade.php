<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Liste des inscriptions validées</h2>
    @php
        $inscriptions = DB::table('inscriptions')->where('confirmation_inscription', 1)->get();
    @endphp
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Nom et Prenom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Ville</th>
                <th>Pays</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscriptions as $v)

                <tr>
                    <td>{{ $v->titre }}</td>
                    <td>{{ $v->name." ".$v->prenom }}</td>
                    <td>{{ $v->telephone }}</td>
                    <td>{{ $v->email }}</td>
                    <td>{{ $v->ville }}</td>
                    <td>{{ $v->pays }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
    <br><br>
     <h3>Liste des participants  non inscrits </h3>
    @php
        $inscriptionsNonValide = DB::table('inscriptions')->where('confirmation_inscription', 0)->get();
    @endphp
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Nom et Prenom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Ville</th>
                <th>Pays</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $inscriptionsNonValide  as $k)

                <tr>
                    <td>{{ $k->titre }}</td>
                    <td>{{ $k->name." ".$k->prenom }}</td>
                    <td>{{ $k->telephone }}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->ville }}</td>
                    <td>{{ $k->pays }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
</body>

</html>
