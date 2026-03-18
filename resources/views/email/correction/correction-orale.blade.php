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
            padding: 20px;
            text-align: center;
        }
        
        .content {
            padding: 20px;
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
                    <div class="header">
                        <h3>  {{ $data->civilite." ".$data->name }}!</h3>
                    </div>
                    <div class="content">
                        {{ "Les 4emes Journées Scientifiques et de Recherche auront lieu du 8-9 novembre 2024 à l'Hôpital Général de Douala." }}
                        <br><br>
                       {{"Nous avons le plaisir de vous informer que votre résumé intitulé : "}} 
            
                       <strong>
                        {{ $data->titre }}
                       </strong>
                       <br>
                       <br>
                       {{ "a été accepté en communication orale sous réserve de modifications à apporter au plutard le 30 Octobre prochain" }}
                       <br> 
                       {{ "Des informations détaillées sur la date et heure de votre présentation vous seront communiquées dans un mail ultérieurement." }}
                       <br>
                       {{  "N'oubliez pas de vous inscrire au plutard le 30 Octobre 2024 pour que votre poster soit affiché lors du congrès et votre abstract, publié dans le livre des résumés."}}
                       <br>
                       {{ " Pour toute question relative aux résumés, veuillez contacter : " }}
                       
                       <em>00237 696 146 559</em>
                       <br>
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
