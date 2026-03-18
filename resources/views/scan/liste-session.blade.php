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

    <br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des sessions</h6>

                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Date</th>
                                <th scope="col">Session</th>
                                <th scope="col">Libellé Salle</th>





                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Statut</th>
                                <th scope="col">Date</th>
                                <th scope="col">Session</th>
                                <th scope="col">Libellé Salle</th>




                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $sessionSalle = DB::table('communication_salles')->where('date_heure', 'like', "%".date('Y-m-d')."%")->orderBy('date_heure', 'asc')->get();
                            @endphp
                            @foreach ($sessionSalle as $v)
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info p-2 dropdown-toggle"
                                                id="dropdownMenuIconButton7" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">

                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                                <a class="dropdown-item" href="/scan-participant/{{ $v->id }}">
                                                    <button class="btn btn-warning p-2">
                                                        <i class="mdi mdi-pencil-box-outline"></i> Scanner participant
                                                        Session </button>
                                                </a>


                                            </div>

                                        </div>



                                    </td>
                                    <td>{{ $v->date_heure }}</td>
                                    <th scope="row">{{ $v->libelle_session }}</th>
                                    <td>{{ $v->libelle_salle }}</td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('assets/loader/loader.js') }}" ></script>
</body>

</html>
