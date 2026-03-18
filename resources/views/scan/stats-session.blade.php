<!DOCTYPE html>
{{--  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  --}}
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JSRHGD') }}</title>


    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/loader/loader.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/ico.png') }}" />


    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        table td .dropdown-menu {
            background-color: transparent !important;
        }

        table .dropdown-menu .dropdown-item:hover {
            color: rgb(77, 76, 76);
            background-color: transparent;
        }

        body input.border-1:focus {
            background-color: white !important;
            border: 1px solid gray;
        }

        body select {
            background-color: white !important;
        }

        body input:focus {
            background-color: white !important;
            border: 1px solid gray !important;
        }

        body>input:focus {
            outline: none;
            background-color: transparent !important;

        }

        #dashboar-card #card-1 {
            /*background-color: #ffffff;*/
            background-color: rgb(12, 160, 201);
            /* padding-block: 10px 20px;*/
            writing-mode: horizontal-tb;

            /* border: 1px solid rgb(58, 55, 55);*/
        }

        #dashboar-card #card-1 h3 {
            color: white;
            font-size: 1.5em;
        }

        #dashboar-card #card-1 h6 {
            color: white;
            /*font-size: 1.3em;*/
        }

        #dashboar-card #card-2 {
            background-color: rgb(3, 13, 16);
            /*padding-block: 10px 20px;*/
            writing-mode: horizontal-tb;
        }

        #dashboar-card #card-2 h3 {
            color: white;
            font-size: 1.5em;
        }

        #dashboar-card #card-2 h6 {
            color: white;
            /*font-size: 1.3em;*/
        }

        #dashboar-card #card-3 {
            background-color: rgb(36, 108, 5);
            /*padding-block: 10px 20px;*/
            writing-mode: horizontal-tb;
        }

        #dashboar-card #card-3 h3 {
            color: white;
            font-size: 1.5em;
        }

        /* #dashboar-card #card-3 h6 {
            color: white;
            font-size: 1.3em;
        }*/

        #dashboar-card #card-4 {
            background-color: #5f1403;
            /*padding-block: 10px 20px;*/
            writing-mode: horizontal-tb;
        }

        #dashboar-card #card-4 h3 {
            color: white;
            font-size: 1.5em;
        }

        /* #dashboar-card #card-2 h6 {
            color: white;
            font-size: 1.3em;
        }*/
    </style>
</head>

<body class="font-sans antialiased">

    <br>
    @php
        $sessionId = DB::table('scan_presences')->select('session_id')->where('created_at', 'like', "%".date('Y-m-d')."%")->distinct()->orderBy('session_id', 'asc')->get();
    @endphp
    <br>

    @foreach ($sessionId as $v)
        @php
            $communicationSalle = DB::table('communication_salles')
                                       ->where('id', $v->session_id)
                                       ->first();  
            $participants = DB::table('inscriptions')
                            ->join('scan_presences', 'scan_presences.invite_id', '=', 'inscriptions.id')
                            ->where('scan_presences.session_id', $v->session_id)
                            ->where('scan_presences.created_at', 'like', "%".date('Y-m-d')."%")
                            ->get();               
        @endphp
        <br>
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex align-items-center justify-content-between">

                        <h6 class="m-0 font-weight-bold text-black-50">Liste des participants : {{ !empty($communicationSalle) ? $communicationSalle->libelle_session : "RAS" }} {{ " " }}: Nombre : {{ count($participants) }}</h6>

                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Session</th>
                                    <th scope="col">Date Passage</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Session</th>
                                    <th scope="col">Date Passage</th>
                                </tr>
                            </tfoot>
                            @php

                            @endphp
                            <tbody>
                               
                                @foreach ($participants as $participant)
                                    <tr>
                                       

                                        <th scope="row">{{ $participant->name." ".$participant->prenom }}</th>
                                        <td>{{ !empty($communicationSalle) ? $communicationSalle->libelle_session : "RAS" }}</td>
                                        <td>{{ !empty($communicationSalle) ? $communicationSalle->date_heure : "RAS" }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('assets/loader/loader.js') }}"></script>
</body>

</html>
