<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Plateforme de depot des demandes d'AMM</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_msas.png')}}"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app-calendar.css') }}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>
<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', function load() {
            var loader = document.getElementById('loader');
            setTimeout(function() {
                loader.classList.add('fadeOut');
            }, 200);
        });
    </script>
    @include('partials.menu')
    <div class="page-container">
        <div class="header navbar">
            <div class="header-container">
                <ul class="nav-left">
                   <li>
                       <a href="#" id="sidebar-toggle" class="sidebar-toggle">
                           <i class="ti-menu"></i>
                       </a>
                   </li>
                </ul>
                <ul class="nav-right">
                  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                    <i class="ion ion-android-person d-lg-none"></i>
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }} <i class="fas fa-power-off"></i></div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a href="profile.html" class="dropdown-item has-icon">
                        <i class="ion ion-android-person"></i> Profile
                      </a>
                        <a class="dropdown-item has-icon" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="ion ion-log-out"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                  </li>
                </ul>
            </div>
        </div>
        <main class='main-content bgc-grey-100' style='background-image: url("img/background.jpg")'>
            <div id='mainContent'>
                <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item  w-100">
                            <div class="row gap-20">
                                <!-- #Toatl Labo Representés ==================== -->
                                <div class='col-md-4'>
                                    <div class="layers bd bgc-white p-20">
                                    <div class="layer w-100 mB-10">
                                        <h6 class="lh-1">Labo Representés</h6>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                        <div class="peer peer-greed">
                                            <span id="sparklinedash"></span>
                                        </div>
                                        <div class="peer">
                                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{ $lab }}</span>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!-- #Toatl Demandes ==================== -->
                                <div class='col-md-4'>
                                    <div class="layers bd bgc-white p-20">
                                    <div class="layer w-100 mB-10">
                                        <h6 class="lh-1">Demandes</h6>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                        <div class="peer peer-greed">
                                            <span id="sparklinedash2"></span>
                                        </div>
                                        <div class="peer">
                                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{ $dem}}</span>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!-- #Toatl Autorisations ==================== -->
                                <div class='col-md-4'>
                                    <div class="layers bd bgc-white p-20">
                                    <div class="layer w-100 mB-10">
                                        <h6 class="lh-1">Autorisations</h6>
                                    </div>
                                    <div class="layer w-100">
                                        <div class="peers ai-sb fxw-nw">
                                        <div class="peer peer-greed">
                                            <span id="sparklinedash3"></span>
                                        </div>
                                        <div class="peer">
                                            <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{ $auto}}</span>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row gap-20">
                                <div class="masonry-item col-md-6">
                                    <!-- #Sales Report ==================== -->
                                    <div class="bd bgc-white">
                                        <div class="layers">
                                            <div class="layer w-100">
                                                <div class="bgc-light-blue-500 c-white p-20">
                                                    <div class="peers ai-c jc-sb gap-40">
                                                        <div class="peer peer-greed">
                                                            <h5>Liste de vos demandes</h5>
                                                            <p class="mB-0">Demandes</p>
                                                        </div>
                                                        <div class="peer">
                                                            <h3 class="text-right">{{ $dem}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="table-responsive p-20">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class=" bdwT-0">Type</th>
                                                                <th class=" bdwT-0">Labo Titulaire de l'AMM</th>
                                                                <th class=" bdwT-0">Nom du Medicament</th>
                                                                <th class=" bdwT-0">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($demande as $demande)
                                                            <tr>
                                                                <td class="fw-600">{{ $demande->type }}</td>
                                                                <td class="fw-600">{{ $demande->labo }}</td>
                                                                <td>{{ $demande->nom_medicament }}</td>
                                                                @if($demande->status == 'Acceptée')
                                                                    <td><span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">{{ $demande->status }}</span></td>
                                                                @elseif($demande->status == 'Rejetée')
                                                                    <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">{{ $demande->status }}</span></td>
                                                                @else
                                                                <td><span class="badge bgc-yellow-50 c-yellow-700 p-10 lh-0 tt-c badge-pill">{{ $demande->status }}</span></td>
                                                                @endif
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="masonry-item col-md-6">
                                    <a class="weatherwidget-io" href="https://forecast7.com/fr/14d72n17d47/dakar/" data-label_1="DAKAR" data-label_2="WEATHER" data-theme="original" >DAKAR WEATHER</a>
                                    <script>
                                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                                    </script>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </main>
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
            {{--footer-text--}}
        </footer>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app-calendar.js') }}"></script>
    <script>
        $(function() {
  let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
  let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
  let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
  let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
  let printButtonTrans = '{{ trans('global.datatables.print') }}'
  let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

  let languages = {
    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
  };

  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages['{{ app()->getLocale() }}']
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      {
        extend: 'copy',
        className: 'btn-default',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-default',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-default',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-default',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-default',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        className: 'btn-default',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
    ]
  });

  $.fn.dataTable.ext.classes.sPageButton = '';
});

    </script>
    @yield('scripts')
</body>
</html>
