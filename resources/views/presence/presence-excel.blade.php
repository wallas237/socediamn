<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Liste de présence : {{ $session->libelle_session }}</h3>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Nom et Prenom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Ville</th>
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
</body>

</html>
