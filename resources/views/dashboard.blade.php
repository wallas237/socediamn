<x-app-layout>
    <div class="container-fluid">

            @php

                $nbreCompte = DB::table('inscriptions')->count();
                $inscriptionConfirmer = DB::table('inscriptions')
                    ->where('confirmation_inscription', 1)
                   ->count();
                   $nbreAbstract = DB::table('abstracts')
                    ->count();
                $abstractRetenu = DB::table('abstracts')
                    ->where('confirmation_abstract', 1)
                    ->count();

            @endphp
            <div class="row" id="dashboar-card">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card" id="card-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{ $nbreCompte }}</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="font-weight-normal">Nombre de participants enregistrés</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card" id="card-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"> {{  $inscriptionConfirmer }} </h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">{{ "Nombre de participants inscrits" }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card" id="card-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{  $nbreAbstract }}</h3>
                                        <p class="text-danger ms-2 mb-0 font-weight-medium"></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-danger">
                                        <span class="mdi mdi-diamond icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">{{ "Nombre d'abstracts" }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card" id="card-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{$abstractRetenu }}</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">{{ "Nombre d'abstracts retenus" }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>


    </div>
    <div class="container-fluid">

    </div>
</x-app-layout>
