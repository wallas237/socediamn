<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIRMATION INSCRIPTION</title>
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
                Votre inscription à l'atelier <strong></strong>
                organisé par <strong>L’Association Franco Africaine de Pathologie Respiratoire (AFA Respir)</strong>
                 le 29/07/2025 de 08-17h à l'hôtel la falaise de Bonanjo, Douala, a été validée <br>


            </h4>
            <br>
            {{-- <p
                style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                {{ "Toutefois si vous souhaitez avoir une lettre d'invitation" }} <a
                    href="https://dashboard.scpneumologie.com/lettre-invitation/{{ $data['id'] }}">Cliquez ici</a>
            </p> --}}
            <br>




        <h3>La Cellule Communication.</h3>
    </div>
</body>
</html>
