<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{ url('home') }}">
                        <div class="peers ai-c fxw-nw">
                        <div class="peer">
                            <div class="logo">
                            <img src="{{ asset('img/logo_msas.png') }}" alt="">
                            </div>
                        </div>
                        <div class="peer peer-greed">
                            <h5 class="lh-1 mB-0 logo-text">Dirpharm</h5>
                        </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="{{ url('home') }}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-home"></i>
                </span>
                <span class="title">Acceuil</span>
              </a>
            </li>
            @if(Auth()->check() && Auth()->user()->role == 'agence')
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('request/create')}}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-file"></i>
                </span>
                <span class="title">Enregistrement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('renouvellement')}}">
                <span class="icon-holder">
                  <i class="c-yellow-500 ti-pencil"></i>
                </span>
                <span class="title">Renouvellement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('variation')}}">
                <span class="icon-holder">
                  <i class="c-green-500 ti-settings"></i>
                </span>
                <span class="title">Variation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('visa')}}">
                <span class="icon-holder">
                  <i class="c-pink-500 ti-palette"></i>
                </span>
                <span class="title">Visa Publicitaire</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('events') }}">
                <span class="icon-holder">
                  <i class="c-deep-orange-500 ti-calendar"></i>
                </span>
                <span class="title">Calendrier</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('laboratoire') }}">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-comment-alt"></i>
                </span>
                <span class="title">Labo Representés</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('autorisation') }}">
                <span class="icon-holder">
                  <i class="c-indigo-500 ti-bar-chart"></i>
                </span>
                <span class="title">Autorisations</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('demande') }}">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-folder"></i>
                </span>
                <span class="title">Demandes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="#">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-money"></i>
                </span>
                <span class="title">Factures</span>
              </a>
            </li>
            @elseif(Auth()->check() && Auth()->user()->role == 'labo')

            <li class="nav-item">
              <a class='sidebar-link' href="{{url('request/create')}}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-file"></i>
                </span>
                <span class="title">Enregistrement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('request/create')}}">
                <span class="icon-holder">
                  <i class="c-yellow-500 ti-pencil"></i>
                </span>
                <span class="title">Renouvellement</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('request/create')}}">
                <span class="icon-holder">
                  <i class="c-green-500 ti-settings"></i>
                </span>
                <span class="title">Variation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('request/create')}}">
                <span class="icon-holder">
                  <i class="c-pink-500 ti-palette"></i>
                </span>
                <span class="title">Visa Publicitaire</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('events') }}">
                <span class="icon-holder">
                  <i class="c-deep-orange-500 ti-calendar"></i>
                </span>
                <span class="title">Calendrier</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('autorisation') }}">
                <span class="icon-holder">
                  <i class="c-indigo-500 ti-bar-chart"></i>
                </span>
                <span class="title">Autorisations</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('demande') }}">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-folder"></i>
                </span>
                <span class="title">Demandes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="#">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-money"></i>
                </span>
                <span class="title">Factures</span>
              </a>
            </li>
            @elseif(Auth()->check() && Auth()->user()->role == 'pharmacien')
            <li class="nav-item">
              <a class='sidebar-link' href="{{url('evaluation')}}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-pencil"></i>
                </span>
                <span class="title">Evaluation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('recevabilite') }}">
                <span class="icon-holder">
                  <i class="c-deep-orange-500 ti-calendar"></i>
                </span>
                <span class="title">Recevabilites</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('autorisation') }}">
                <span class="icon-holder">
                  <i class="c-indigo-500 ti-bar-chart"></i>
                </span>
                <span class="title">Autorisations</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('demande') }}">
                <span class="icon-holder">
                  <i class="c-light-yellow-500 ti-folder"></i>
                </span>
                <span class="title">Demandes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('laboratoire') }}">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-share"></i>
                </span>
                <span class="title">Laboratoires</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="{{ url('agence') }}">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-share"></i>
                </span>
                <span class="title">Agences</span>
              </a>
            </li>
            @else
            <li class="nav-item">
                <a class='sidebar-link' href="{{ url('users') }}">
                    <span class="icon-holder">
                    <i class="c-light-blue-500 ti-user"></i>
                    </span>
                    <span class="title">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class='sidebar-link' href="#">
                    <span class="icon-holder">
                    <i class="c-light-blue-500 ti-money"></i>
                    </span>
                    <span class="title">Paiements</span>
                </a>
            </li>
            <li class="nav-item">
                <a class='sidebar-link' href="#">
                    <span class="icon-holder">
                    <i class="c-light-blue-500 ti-file"></i>
                    </span>
                    <span class="title">Logs</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
