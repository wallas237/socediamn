<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>{{ "Liste de présence à l'atelier ESSENTIEL SUR LA VNI, LAPPC ET L'OXYGENOTHERAPIE EN AIGU" }}</h3>
    @php
        $inscriptions = DB::table('inscription_atelier_afa_respirs')
        ->join('scan_afa_respires', 'scan_afa_respires.id_participant', '=', 'inscription_atelier_afa_respirs.id')
        ->select('inscription_atelier_afa_respirs.*')
        ->distinct()
        ->get();
    @endphp
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Nom et Prenom</th>
                <th>Email</th>
                <th>Pays</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($inscriptions as $v)

                <tr>
                    <td>{{ $v->titre }}</td>
                    <td>{{ $v->name." ".$v->prenom }}</td>
                    <td>{{ $v->email }}</td>
                    <td>{{ $v->pays }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
</body>

</html>
