<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préinscription au congrès SOCEDIAMN & SFADE</title>

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
                <div style="display: flex;">
                    <img src="https://api.socediamn.org/img/socediamn.png"
                    alt='inscription à 5ème Congrès de la SOCEDIAMN et 8ème Congrès de la SFADE' />
                    <img src="https://api.socediamn.org/img/sfade.jpg"
                    alt='inscription à 5ème Congrès de la SOCEDIAMN et 8ème Congrès de la SFADE' />
                </div>

                {{-- <h3>{{ $data['name'] }}, {{ $data['id'] }}</h3> --}}
                <h3>{{ $data['name'] }}</h3>
                @if ($data['charge'] == 'Oui')
                    <p>
                        Votre pré-inscription au 5<sup>ème</sup> congrès de la SOCEDIAMN et 8<sup>ème</sup>congrès de la
                        SFADE a été enregistrée avec succès.


                    </p>
                @else
                    <p>
                        Votre pré-inscription au 5<sup>ème</sup> congrès de la SOCEDIAMN et 8<sup>ème</sup>congrès de la
                        SFADE a été enregistrée avec succès.

                        Veuillez finaliser votre inscription en effectuant un dépôt avec frais de retrait correspondant
                        aux frais de
                        participation,
                        à {{ "l'un des numéros suivant" }}
                        <br>
                        <strong>NB : </strong>Si vous ne pouvez pas effectuer le dépôt avec frais de retrait, veuillez
                        appeler l'un des contacts mentionnés pour les
                        dépôts pour effectuer un paiement en espèce.


                    </p>
                    <br>
                    <h4>
                        OrangeMoney : 691 208 941 <em> NOEL DESIREE MBANGO NGOH EDISARI EPSE EKOUTA </em>
                        <br><br>
                        MobileMoney : 681 865 979 <em> NOEL DESIREE MBANGO NGOH EDISARI EPSE EKOUTA </em>

                    </h4>
                    <p>
                        Veuillez contacter un des numéros suivant pour confirmer votre paiement
                    </p>
                    <h4>
                        00237 682 426 849 / 659 299 493


                    </h4>
                    <br>
                    @if ($data['specialite'] == 5 or $data['specialite'] == 12)
                        <h3>Votre participation au congès est gratuite</h3>
                    @else
                        <h3>{{ "Tarifs d'inscription" }}</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Catégories</th>
                                    <th>Jusqu’au 30/03/26</th>
                                    <th>Du 01/04/26 au 15/04/26</th>
                                    <th>Sur site : 16-18/04/26</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if ($data['specialite'] == 10)
                                        <td>Spécialistes non-membres de la SOCEDIAMN</td>
                                        <td>50 000 XAF</td>
                                        <td>60 000 XAF</td>
                                        <td>75 000 XAF</td>
                                    @elseif($data['specialite'] == 8)
                                        <td>Spécialistes membres de la SOCEDIAMN</td>
                                        <td>35 000 XAF</td>
                                        <td>45 000 XAF</td>
                                        <td>50 000 XAF</td>
                                    @elseif($data['specialite'] == 2)
                                        <td>Résidents Internes</td>
                                        <td>30 000 XAF</td>
                                        <td>35 000 XAF</td>
                                        <td>40 000 XAF</td>
                                    @elseif($data['specialite'] == 3)
                                        <td>Médecins généralistes</td>
                                        <td>10 000 XAF</td>
                                        <td>15 000 XAF</td>
                                        <td>20 000 XAF</td>
                                    @elseif($data['specialite'] == 4)
                                        <td>Infirmiers / Diététiciens / Nutritionnistes</td>
                                        <td>5 000 XAF</td>
                                        <td>10 000 XAF</td>
                                        <td>15 000 XAF</td>
                                    @elseif($data['specialite'] == 6)
                                        <td>Participants hors Afrique</td>
                                        <td>75 000 XAF</td>
                                        <td>85 000 XAF</td>
                                        <td>100 000 XAF</td>
                                    @else
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endif

            </div>

        </div>
    </div>
</body>

</html>
