@extends('layouts.layout')
<script>
$('.file-upload').file_upload();
</script>
@section('content')
<div class="mT-30">
    <div class="jumbotron">
        <h1 class="display-5">Suivi de Votre Demande</h1>
        <p class="lead">{{ $demande->type}} du produit: <strong>{{ $produit->nom_medicament }} {{ $produit->forme_pharmaceutique }} </strong> du laboratoire <I>{{ $demande->labo }}</I></p>
        <hr class="my-4">
        @if($demande->status != 'Acceptée')
            <div class="alert alert-warning">
                Status: <strong>{{ $demande->status}}</strong>
            </div>
        @else
            <div class="alert alert-success">
                Status: <strong>{{ $demande->status}}</strong>
            </div>
        @endif
        <p class="lead"></p>
    </div>

    <div class="card">
        <div class="card-header"><h3>Veuillez payer les frais de traitement de dossier</h3></div>
        <div class="card-body">
            <a href="{{ route('payment') }}">payment</a>
        </div>
    </div>


    <div class="card">
        <div class="card-header"><h3>Veuillez deposer votre dossier complet ici</h3></div>
        <div class="card-body">
            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="1" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
                            <label class="custom-file-label" for="customFile">Module 1</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="2" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
                            <label class="custom-file-label" for="customFile">Module 2</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="3" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
                            <label class="custom-file-label" for="customFile">Module 3</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="4" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
                            <label class="custom-file-label" for="customFile">Module 4</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="5" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
                            <label class="custom-file-label" for="customFile">Module 5</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
$(function() {

var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');

$('form').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal);
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal);
        percent.html(percentVal);
    },
    complete: function(xhr) {
        status.html(xhr.responseText);
    }
});
});
</script>
@endsection
