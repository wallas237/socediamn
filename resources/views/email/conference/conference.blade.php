<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>4e JSR-HGD</title>

    <style>

        body {
            margin: 0;
            padding: 0;
        }

        table, td, div, h3, p {
            font-family: Arial, sans-serif;
        }


        h2{
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;


        }

        .container img{
            width: 100%;

        }

        .header {
           /* background-color: #9fc6f0;*/
           /*color: #fff;*/
            padding-top: 10px;
            padding-left: 20px;
            text-align: center;
        }

        .content {
            padding-top: 1px;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
        }

        .footer {
            background-color: #3A5D9F;
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
                        <img src="https://journees-scientifiques-hgd.com/logo-email.jpeg" alt="4e Journées scientifiques et de recherche de HGD" title="4e Journées scientifiques et de recherche de HGD">
                    </div>
                    <div class="header" style="text-align: left;">
                        <h3>  {{ $data->titre." ".$data->name." ".$data->prenom }}!</h3>
                    </div>
                    <div class="content">

                       {{"Vous avez été retenu comme conférencier aux journées scientifiques et de recherche de l'Hôpital Général de Douala."}}
                       <br>
                       {{ "Un résumé de votre présentation est attendu" }}
                       <strong>au plus tard dimanche le 03/11/2024 à minuit </strong>
                       <span>car il doit figurer dans le livre des abstracts.</span>
                       <br>
                       <strong>NB : </strong>
                       <br>
                       <span>1. bien vouloir vous inscrire en ligne pour bénéficier de {{ "l'attestation de participation" }}. <a href="https://journees-scientifiques-hgd.com">Cliquez ici pour vous inscrire</a></span>
                       <br>
                       <span>Template pour votre présentation ci-joint.</span>
                       <em>00237 696 146 559</em>
                       <br>

                       Cordialement,

                    </div>
                    <div class="footer">
                        <p>&copy; {{ date('Y') }} JSR-HGD. Tous droits réservés.</p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
