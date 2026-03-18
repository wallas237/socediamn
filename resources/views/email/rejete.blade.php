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
                                    {{ 'Après évaluation, nous sommes au regret de vous annoncer que votre soumission intitulée :' }}
                                    <br>
                                    <strong>
                                        {{ $data->titre }}
                                    </strong>

                                </p>


                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                    {{ 'n’a pas été retenue en communication au 5' }}<sup>ème</sup> Congrès de la
                                    <strong>SOCEDIAMN(Société Camerounaise d'Endocrinologie, Diabétologie, Métabolisme
                                        et Nutrition)</strong> et
                                    au 8 <sup>ème</sup>Congrès de la <strong>SFADE (Société Francophone Africaine de
                                        Diabétologie et d’Endocrinologie)</strong>
                                    qui aura lieu du <strong>16 au 18 Avril 2025</strong> à <strong> la Faculté de
                                        Médecine et des
                                        Sciences Biomédicales de l’Université de Yaoundé I, à Yaoundé</strong>
                                    <br>
                                </p>
                               {{--  <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                   Motif : {{ $com->motif }}
                                </p> --}}
                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                    Le nombre de résumés de communication reçus était important, avec pour conséquence,
                                    une élévation du niveau d'exigence de la qualité de la soumission, aussi bien sur le
                                    fond que la forme
                                    <br>
                                    Espérant que cela ne constitue pas un frein pour votre participation au congrès,
                                    nous sommes heureux de vous accueillir bientôt en terre africaine de Yaoundé.
                                   
                                    <br>
                                     Nos salutations cordiales.
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
