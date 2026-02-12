<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congrès societe Camerounaise de cardiologie</title>

    <style type="text/css">
        .inscription {
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .inscription .form {
            width: 100%;
            padding-top: 2%;
            padding-bottom: 2%;


            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

        }

        .inscription .form div {


            width: 90%;


        }

        .inscription .form p {
            font-size: 1.3em;
            padding-right: 10%;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

</head>

<body>

    <div class="inscription">
        <div class="form">
            <div>
                <h2>{{ "Confirmation d'inscription" }}</h2>
                <img src="https://socediamn.cm/img/socediamn.png" alt='inscription à 4ème Congrès de la SOCEDIAMN' />



                <p>
                    <a href="https://socediamn.cm/lettre-invitation/{{ $id }}">Cliquez ici pour télécharger
                        votre lettre {{ "d'invitation" }}</a>
                </p>



            </div>

        </div>
    </div>
</body>

</html>
