<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Liste de présence</h3>
    @php
        $inscriptions = DB::table('inscriptions')
            ->where('confirmation_inscription', 0)
            ->orderBy('pays', 'asc')
            ->get();
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
                @php
                    $scanPresence1 = DB::table('scan_presences')
                        ->where('session_id', 10)
                        ->where('invite_id', $v->id)
                        ->first();
                    $scanPresence2 = DB::table('scan_presences')
                        ->where('session_id', 29)
                        ->where('invite_id', $v->id)
                        ->first();
                    $scanPresence3 = DB::table('scan_presences')
                        ->where('session_id', 39)
                        ->where('invite_id', $v->id)
                        ->first();
                @endphp
                @if (!empty($scanPresence1) || !empty($scanPresence2) || !empty($scanPresence3))
                    <tr>
                        <td>{{ $v->titre }}</td>
                        <td>{{ $v->name . ' ' . $v->prenom }}</td>
                        <td>{{ $v->telephone }}</td>
                        <td>{{ $v->email }}</td>
                        <td>{{ $v->ville }}</td>
                        <td>{{ $v->pays }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
