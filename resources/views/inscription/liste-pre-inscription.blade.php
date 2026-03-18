<x-app-layout>
    @if (session('message'))
        <x-dialogue-alert color="{{ session('color') }}" message="{{ session('message') }}" />
    @endif


    <br>

    <br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-black-50">Liste des Préinscriptions</h6>
                    {{-- <a href="/liste-presence-excel">Télécharger Liste Présence</> --}}


                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Actions</th>
                                <th scope="col">Nom & Prénom </th>
                                <th scope="col">Grade</th>
                                <th scope="col">Spécialité</th>

                                <th scope="col">Email Adress</th>
                                <th scope="col">Phone </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Actions</th>
                                <th scope="col">Nom & Prénom </th>
                                <th scope="col">Grade</th>
                                <th scope="col">Spécialité</th>

                                <th scope="col">Email Adress</th>
                                <th scope="col">Phone </th>

                            </tr>
                        </tfoot>
                        @php

                        @endphp
                        <tbody>
                            @php
                                $inscript = DB::table('inscriptions')->where('confirmation_inscription', 0)->get();
                            @endphp
                            @foreach ($inscript as $v)
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary p-2 dropdown-toggle"
                                                id="dropdownMenuIconButton7" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-account"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                                <a class="dropdown-item" href="/update-inscription/{{ $v->id }}">
                                                    <button class="btn btn-warning p-2">
                                                        <i class="mdi mdi-account-convert"></i> Modifier Infos </button>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="/confirmez-inscription/{{ $v->id }}" target="_blank"
                                                    onclick="return Confirm('Confirmer une inscription')"> <button
                                                        class="btn btn-success p-2">
                                                        Confirmez une inscription </button>
                                                </a>
                                                <a class="dropdown-item" href="/lettre-invitation/{{ $v->id }}"
                                                    target="_blank">
                                                    <button class="btn btn-success p-2">
                                                        <i class="mdi mdi-email-outline"></i> Voir lettre Invitation
                                                    </button>
                                                </a>
                                                <a href="/envoyez-lettre-invitation/{{ $v->id }}"
                                                    style="text-decoration: none; color: white;" target="_blank">
                                                    <button class="btn btn-primary p-2">
                                                        <i class="mdi mdi-email-outline"></i>
                                                        Envoyez lettre
                                                        d'invitation
                                                    </button>
                                                </a>
                                                {{-- <a class="dropdown-item"
                                                    href="/certificat-participation/{{ $v->id }}" target="_blank" onclick="return Confirm('Merci de confirmer l\'envoi du certificat de participation')"> <button
                                                        class="btn btn-success p-2">
                                                     Visualisez certificat </button>
                                                </a> --}}
                                                {{-- <a href="/envoyer-participate/{{ $v->id }}"
                                                    class="dropdown-item" onclick="return confirm('Confirmez en appuyant sur ok')"
                                                    ><button
                                                        class="btn btn-info p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Envoyez certificat ' }}</button></a>
                                                </a>
                                                <a href="/moderation-certificat/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-danger p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Visualiser Cert Modération ' }}</button></a>
                                                </a>
                                                <a href="/orateur-certificat/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-dark p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ 'Visualiser Cert Orateur' }}</button></a>
                                                </a> --}}
                                                {{-- <a href="/third-chercheur/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-warning p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ '3eme Prix Chercheur' }}</button></a>
                                                </a>
                                                <a href="/specialiste-first/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-danger p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ '1er Prix Spécialiste' }}</button></a>
                                                </a>
                                                <a href="/specialiste-second/{{ $v->id }}"
                                                    class="dropdown-item" target="_blank"
                                                    ><button
                                                        class="btn btn-primary p-2">
                                                        <i
                                                            class="mdi mdi-email-outline"></i>{{ '2eme Prix Spécialiste' }}</button></a>
                                                </a>  --}}
                                            </div>

                                        </div>
                                    </td>

                                    <th scope="row">{{ $v->titre . ' ' . $v->name . ' ' . $v->prenom }}</th>

                                    <td>
                                        @php
                                            $grade = DB::table('grades')->where('id', $v->grade)->first();
                                            $specialiste = DB::table('specialites')
                                                ->where('id', $v->specialite)
                                                ->first();
                                        @endphp
                                        {{ !empty($grade) ? $grade->titre : '' }}
                                    </td>
                                    <th>{{ !empty($specialiste) ? $specialiste->speciality : 'Non définie' }}</th>

                                    <td>{{ $v->email }}</td>
                                    <td>{{ $v->telephone }}</td>




                                </tr>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @php

        if (session('compte')) {
            session()->pull('compte', session('compte'));
        }

        if (session('message')) {
            session()->pull('message', session('message'));
            session()->pull('color', session('color'));
        }

    @endphp

</x-app-layout>
