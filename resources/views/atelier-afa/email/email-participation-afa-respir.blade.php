<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat de participation</title>
<style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
    }
</style>
</head>
<body>
    <div style="display: flex; align-items: space-between; justify-content: center;">
        <img src="https://scpneumologie.com/images/logo-respir.png" alt="Association Franco Africaine de Pathologie Respiratoire" style="width: 40%;">

    </div>
    <div class="mail">
        <h3> Cher(e) {{ $data['name'] }} </h3>

            <h4>
                Veuillez cliquer sur le lien suivant  <a
                    href="https://dashboard.scpneumologie.com/afa-respir-certificat-participation/{{ $data['id'] }}">Cliquez ici</a> et télécharger votre attestation de participation à l'atelier
                <br>Les supports des présentations effectuées lors de cet atelier sont disponibles sur le lien <a href="https://drive.google.com/drive/folders/1QglbODMclfVOSa0JvYWDaujIsEXmBv4z?usp=drive_link">DIAPORAMA ATELIER  29-07-2025</a>
                <br>
                Par ailleurs, si vous souhaitez adhérer à l'association AFA Respir, vous pouvez adresser votre demande en ligne via le lien <a href="https://docs.google.com/forms/d/e/1FAIpQLSfOvivFTVxB5ZWgkjYNEiK6As0rGII6d_SzWDWsfUj7Z4zl3g/viewform?usp=sf_link">Cliquez ici</a>

            </h4>
            <br>
            <h4>
                Dans l'attente de vous retrouver.
            </h4>
            {{-- <p
                style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                {{ "Toutefois si vous souhaitez avoir une lettre d'invitation" }} <a
                    href="https://dashboard.scpneumologie.com/lettre-invitation/{{ $data['id'] }}">Cliquez ici</a>
            </p> --}}
            <br>




        <h3></h3>
    </div>
</body>
</html>
