<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dirpharm App | Inscription</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_msas.png')}}"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <style>
      #loader {
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000;
      }

      #loader.fadeOut {
        opacity: 0;
        visibility: hidden;
      }

      .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
      }

      @-webkit-keyframes sk-scaleout {
        0% { -webkit-transform: scale(0) }
        100% {
          -webkit-transform: scale(1.0);
          opacity: 0;
        }
      }

      @keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        } 100% {
          -webkit-transform: scale(1.0);
          transform: scale(1.0);
          opacity: 0;
        }
      }
    </style>
  </head>
  <body class="app">
    <div id='loader'>
      <div class="spinner"></div>
    </div>

    <script>
      window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function() {
          loader.classList.add('fadeOut');
        }, 300);
      });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url("img/msas.jpg")'>
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style='width: 120px; height: 120px;'>
                    <img class="pos-a centerXY" src="img/logo_msas.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;'>
            <h4>Inscription</h4>
            <p class="fw-300 c-grey-900 mB-40">Avez-vous deja un compte? <a href="{{ route('login') }}">Se connecter</a></p>
            <div class="card card-primary">
                <div class="card-header">
                    <div class="float-right">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Agence</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Labo</a>
                        </div>
                    </div>
                    <h5>Vous êtes?</h5>
                </div>
                <div class="tab-content card-body" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" value="agence" name="role">

                            <div class="form-group">
                                <label for="name">Nom de l'agence</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="name">
                            </div>

                            <div class="form-group">
                                <label for="telephone">Numero de Telephone</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="telephone">
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="adresse">
                            </div>

                            <div class="form-group">
                                <label for="adresse">Region</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="region">
                            </div>

                            <div class="form-group">
                                <label for="pays">Pays</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="pays">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Adresse mail</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>

                            <div class="form-group">
                                <label for="password2" class="d-block">Confirmer le mot de passe</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">S'insrire</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" value="labo" name="role">

                            <div class="form-group">
                                <label for="name">Nom du Laboratoire</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="name">
                            </div>

                            <div class="form-group">
                                <label for="telephone">Numero de Telephone</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="telephone">
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="adresse">
                            </div>

                            <div class="form-group">
                                <label for="adresse">Code Postal</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="zip">
                            </div>

                            <div class="form-group">
                                <label for="adresse">Region</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="region">
                            </div>

                            <div class="form-group">
                                <label for="pays">Pays</label>
                                <input type="text" class="form-control" aria-describedby="textHelp" name="pays">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Adresse mail</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>

                            <div class="form-group">
                                <label for="password2" class="d-block">Confirmer le mot de passe</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">S'insrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/bundle.js') }}"></script>
    <link href="{{ asset('js/bootstrap.js') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
  </body>
</html>
