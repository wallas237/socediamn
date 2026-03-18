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
            max-width: 1200px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container .img img{
            max-width: 1100px;
            
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
                        <img src="https://journees-scientifiques-hgd.com/logo-email.jpeg" alt="4e Journées scientifiques et de recherche de HGD" title="4e Journées scientifiques et de recherche de HGD">
                    </div>
                    <div class="header">
                        <h3>{{ $data->titre." ".$data->name }}!</h3>
                    </div>
                    <div class="content">

                       {{"L’Hôpital Général de Douala vous remercie d'avoir participé aux 4e Journées Scientifiques et de Recherche, qui se sont tenues les 8 et 9 Novembre dans l’enceinte de l’hôpital. "}}
                       <br>
                       {{ "Pour obtenir votre certificat de participation/communication, nous vous prions de donner votre avis en cliquant sur le lien ci-dessous." }}
                       <br>
                       <a href="https://dashboard.journees-scientifiques-hgd.com/quiz-participant/{{ $data->id }}">{{ "Cliquez ici pour laisser un avis" }}</a>
                       <br>
                       Cordialement,
                       <br>
                       <em>Le Sécretariat</em>
                    </div>
                </div>
            </td>
        </tr>
        
    </table>
    
</body>
</html>