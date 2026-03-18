<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>congrès SOCEDIAMN & SFADE</title>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        table,
        td,
        div,
        h3,
        p {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .header {
            /* background-color: #9fc6f0;*/
            /*color: #fff;*/
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <div class="container">
                    <div class="img">
                        <table>
                            <thead>
                                <tr>
                                    <th><img src="https://api.socediamn.org/img/socediamn.png"
                                            alt='5ème Congrès de la SOCEDIAMN et 8ème Congrès de la SFADE' /></th>
                                    <th><img src="https://api.socediamn.org/img/sfade.jpg"
                                            alt='5ème Congrès de la SOCEDIAMN et 8ème Congrès de la SFADE' /></th>
                                </tr>
                            </thead>
                        </table>


                    </div>
                    <div class="header">
                        <h3>{{ 'Hello ' . $data->correspondant }}</h3>

                        <p> {{ "Recevez ci-dessous l'abstract : " }} {{ $data->civilite . ' ' . $data->name }}!</p>
                    </div>
                    <div class="content">

                        {{ 'Titre : ' }}
                        <br>
                        {{ $data->titre }}
                        <br>
                        {{ 'Affiliation des auteurs' }}
                        <br>
                        {{ $data->affiliation }}
                        <br>
                        {{ 'Auteurs : ' }}
                        <br>
                        {{ $data->auteurs }}
                        <br>
                        {{ 'Thème: ' }}
                        <br>
                        {{ $data->titre }}
                        <br>
                        {{ 'Résumé' }}
                        <br>

                        @php echo html_entity_decode($data->introduction); @endphp
                        <br>
                        Cordialement,
                        <br>
                        <em>Le Sécretariat scientifiques</em>
                    </div>
                    <div class="footer">
                        <p>&copy; {{ date('Y') }} SOCEDIAMN. Tous droits réservés.</p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
