<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">

        <a class="sidebar-brand brand-logo" href="/dashboard">
        </a>
        <a class="sidebar-brand brand-logo-mini" href="/dashboard"></a>


    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('assets/images/admin.png') }}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">

                        <h5 class="mb-0 font-weight-normal">
                            {{ auth()->user()->name }}</h5>
                        <span>

                        </span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="/profile" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Profile</p>
                        </div>
                    </a>
                    <div class="dropdown-divider bg-gray-100"></div>




                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            @if (auth()->user()->login != '')
                <a class="nav-link" href="/welcome">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            @else
                <a class="nav-link" href="/dashboard">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            @endif

        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-arbre" aria-expanded="false"
                aria-controls="ui-arbre">
                <span class="menu-icon">
                    <i class="mdi mdi-file-tree"></i>
                </span>
                <span class="menu-title">Inscriptions</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-arbre">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('liste.pre.inscription') }}">Liste des
                            Pré-inscription</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('liste.inscription') }}">Liste des
                            Inscription</a>
                    </li>
                     <li class="nav-item"> <a class="nav-link" href="/liste-presence-congres">Voir toutes les sessions</a>
                    </li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('badge.non.imprime') }}">Badges non Imprimés</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('inscription') }}">
                            Inscription</a>
                    </li>

                </ul>
            </div>
        </li>
     
       
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Abstracts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('liste.abstracts') }}">Liste des
                            Com</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('liste.abstracts.valide') }}">Liste
                            Com Validées</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('liste.conference') }}">Liste des
                            Conférence</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('liste.valide.conference') }}">Liste
                            Conférences Validées</a>
                    </li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('ajouter.session') }}">Ajouter Session
                            /
                            Atélier</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-etat" aria-expanded="false"
                aria-controls="ui-etat">
                <span class="menu-icon">
                    <i class="mdi mdi-account-card-details"></i>
                </span>
                <span class="menu-title">Badges</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-etat">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/badge-participant" target="_blank">Imprimer
                            Badges</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/badge-particulier">Badge Particulière</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/badge-personnel-appui">Badge Personnel appui</a>
                    </li>

                    {{--  <li class="nav-item"> <a class="nav-link" href="/shop-ca">Hist. Retraits</a></li>
                        <li class="nav-item"> <a class="nav-link" href="/liste-achat">Hist. Achat</a></li>  --}}
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-quiz" aria-expanded="false"
                aria-controls="ui-quiz">
                <span class="menu-icon">
                    <i class="mdi mdi-account-card-details"></i>
                </span>
                <span class="menu-title">Quiz</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-quiz">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/creer-titre" target="_blank">Ajouter un Titre</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/resultat-quiz">Resultat Quiz</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="/badge-personnel-appui">Voir Résultats</a>
                    </li> --}}

                    {{--  <li class="nav-item"> <a class="nav-link" href="/shop-ca">Hist. Retraits</a></li>
                        <li class="nav-item"> <a class="nav-link" href="/liste-achat">Hist. Achat</a></li>  --}}
                </ul>
            </div>
        </li>

    </ul>
</nav>
