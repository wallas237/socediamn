<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SOCEDIAMN</title>
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url('font/SourceSansPro-Regular.ttf');
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }



        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            /*width: 21cm;
            height: 29.7cm; */
            width: 20.3cm;

            /*margin: 0 auto; */
            margin-left: -32px;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            margin-top: -120px;
            height: 100px;
            position: fixed;
            width: 109%;
            border-bottom: 1px solid #AAAAAA;
            /*page-break-after: always;*/
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            padding-top: 45px;
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th {
            padding: 15px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;

        }

        table td {
            padding: 10px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            position: fixed !important;
            height: 40px;
            color: #777777;
            width: 113%;
            margin-left: -2%;
            bottom: -6%;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
            /* background-color: red;*/
        }

        .entete {
            width: 100%;
            display: flex !important;
            justify-content: space-between;
            margin-top: -10%;

        }

        .entete .img {
            padding: 25px 20px 10px 40px;
        }

        .h {
            position: absolute;
            right: 10%;
            top: -4%;
            text-align: center;
        }

        .h h4:first-child {
            color: red;
            font-style: italic;

        }

        .h h4:last-child {
            color: #003380ff;
            position: absolute;
            top: 2%;
            font-style: italic;
            text-align: center;
        }

        .entete>h4 {
            top: 1%;
            position: absolute;
            font-style: italic;
            text-align: center;
            left: 45%;
        }

        .signature{
            
            width: 40%;
            margin-left: 30%;
        }
    </style>

</head>

<body>

    <div class="entete">
        <div class="img">
            <img src="img/socediamn.png" alt="4ème congrès de la socediamn">
        </div>
        <div class="h">
            <h4>Société Camerounaise d’Endocrinologie, Diabétologie, Métabolisme et Nutrition</h4>
            <h4> Cameroon Society of Endocrinology, Diabetology, Metabolism and Nutrition</h4>
        </div>
        <h4>N°00000222/RDA/J06/SAAJP/BAPP</h4>
    </div>

    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">Facture de :</div>
                <h2 class="name" style="text-transform: uppercase;">{{ $nom }}</h2>
                
            </div>
            <div id="invoice">
                <h1>FACTURE N° 00000{{ $id }}/LAB</h1>
                <div class="date">{{ 'Date' }} : {{ date('d-m-Y') }}</div>
                <div class="date"></div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">{{ '#' }}</th>
                    <th class="desc">{{ 'Désignation' }}</th>
                    <th class="unit">{{ 'Prix Unitaire' }}</th>
                    <th class="qty">{{ 'Quantite' }}</th>
                    <th class="total">{{ 'Total' }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                    $total = 0;
                    $prix = 0;
                    $quantite = 1;
                @endphp
                @foreach ($infos as $v)
                    @php
                        $prixTotal = $v->montant * $quantite;
                        $total += $prixTotal;
                    @endphp
                    <tr>
                        <td class="no">{{ $i }}</td>
                        <td class="desc">
                            <h3></h3>{{ $v->speciality }}
                        </td>
                        <td class="unit">{{ $v->montant }}</td>
                        <td class="qty">{{ $quantite }}</td>
                        <td class="total">{{ $prixTotal }}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">{{ 'Total' }}</td>
                    <td>{{ $total }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">{{ 'Avance effectuée' }}</td>
                    <td>{{ $total }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">{{ 'Reste à payer' }}</td>
                    <td>0</td>
                </tr>
               

            </tfoot>
        </table>
        {{--  <div id="thanks">Thank you!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>  --}}
    </main>
    <div class="signature">
        <div class="signature-1" style="position: relative;">
            <h4 style="width: 70%;">
                Le Président du Comité <b />
                Local d’organisation
            </h4>
            <h4>
                Professeur Siméon CHOUKEM
            </h4>
            <img src="img/prsimeon.png" alt="4ème congrès de la socediamn" style="width: 60%;">
            <img src="img/cachetsocediamn.png" alt="4ème congrès de la socediamn" style="width: 60%; position: absolute; left: 20%; z-index: 0;">
        </div>
    </div>
    <footer>
        {{--  Invoice was created on a computer and is valid without the signature and seal.  --}}
    </footer>
</body>

</html>
