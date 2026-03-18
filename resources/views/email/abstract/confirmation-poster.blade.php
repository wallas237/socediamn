<x-email-sender>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body"
        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f5f6; width: 100%;"
        width="100%" bgcolor="#f4f5f6">
        <tr>
            <td style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top;" valign="top">&nbsp;
            </td>

            <td class="container"
                style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; max-width: 600px; padding: 0; padding-top: 24px; width: 600px; margin: 0 auto;"
                width="600" valign="top">
                <div class="content"
                    style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 600px; padding: 0;">

                    <!-- START CENTERED WHITE CONTAINER -->
                    <span class="preheader"
                        style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">
                    </span>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main"
                        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border: 1px solid #eaebed; border-radius: 16px; width: 100%;"
                        width="100%">

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper"
                                style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; box-sizing: border-box; padding: 24px;"
                                valign="top">
                                <p>
                                </p>
                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                <h3> {{ $data->civilite . ' ' . $data->name }} </h3>
                                </p>
                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                    {{ 'Après évaluation, le Comité Scientifique a le plaisir de vous informer que votre soumission intitulée :' }}
                                    <br>
                                    <strong>
                                        {{ $com->titre }}
                                    </strong>

                                </p>


                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                    {{ 'a été accepté en communication affichée au 5' }}<sup>ème</sup> Congrès de la
                                    <strong>SOCEDIAMN(Société Camerounaise d'Endocrinologie, Diabétologie, Métabolisme
                                        et Nutrition)</strong> et
                                    au 8 <sup>ème</sup>Congrès de la <strong>SFADE (Société Francophone Africaine de
                                        Diabétologie et d’Endocrinologie)</strong>
                                    qui aura lieu du <strong>16 au 18 Avril 2025</strong> à <strong> la Faculté de
                                        Médecine et des
                                        Sciences Biomédicales de l’Université de Yaoundé I, à Yaoundé</strong>
                                    <br>
                                </p>
                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                   {{--  {{ 'Le poster doit être conçu en format portrait; et sa taille n’excédera pas 110 cm de hauteur et 80 cm de largeur. Le masque de présentation proposé par les organisateurs est joint au présent mail.' }}
                                    <br>
                                    <a href="https://dashboard.scpneumologie.com/masque_de_presentation_poster.pptx" download="masque_de_presentation_poster.pptx">Cliquez ici pour récupérer le masque de présentation</a>

                                    <br>
                                    {{ "Votre présentation sera affichée le $com->date entre 8H30 et 18H00 et placée au panneau N°$com->panneau. Un des auteurs devra être présent devant l’affiche entre 10h35 et 11h00, afin de présenter le travail et répondre aux questions des présidents de session et du public. Si votre équipe doit présenter plusieurs communications, vous devez vous assurer qu’un co-auteur est présent devant l’affiche pour la présenter au passage des présidents de session." }} --}}
                                    <br>
                                    {{ "Ce document tient lieu d’acceptation de résumé de communication. Aucun autre document ne sera délivré." }}
                                    <br>
                                    {{ "Nous sommes heureux de vous accueillir bientôt en terre africaine de Yaoundé." }}
                                    <br>
                                    {{ "Nos salutations cordiales." }}
                                </p>
                                <br>
                                <h3>{{ "Le comité scientifique du congrès." }}</h3>
                            </td>
                        </tr>

                        <!-- END MAIN CONTENT AREA -->
                    </table>

                    <!-- START FOOTER -->
                    <div class="footer" style="clear: both; padding-top: 24px; text-align: center; width: 100%;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                            style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;"
                            width="100%">
                            <tr>
                                <td class="content-block"
                                    style="font-family: Helvetica, sans-serif; vertical-align: top; color: #9a9ea6; font-size: 16px; text-align: center;"
                                    valign="top" align="center">
                                    <span class="apple-link"
                                        style="color: #9a9ea6; font-size: 16px; text-align: center;"></span>
                                    <br> <a href=""
                                        style="text-decoration: underline; color: #9a9ea6; font-size: 16px; text-align: center;">{{ 'SOCEDIAMN & SFADE' }}</a>.
                                </td>
                            </tr>

                        </table>
                    </div>

                    <!-- END FOOTER -->

                    <!-- END CENTERED WHITE CONTAINER -->
                </div>
            </td>
            <td style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top;" valign="top">&nbsp;
            </td>
        </tr>
    </table>
</x-email-sender>
