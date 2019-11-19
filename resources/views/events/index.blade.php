@extends('layouts.layout')

@section('content')
<div class="mT-30">
    <div class="card">
        <div class="card-header">Demande de Rendez-vous</div>

        <div class="card-body">
            <form action="#" >
                <div class="input-group control-group after-add-more">
                    <div class="col-md-4">
                        <label for="">Motif</label>
                        <input type="text" name="addmore[]" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <label for="">Date</label>
                        <input type="date" name="addmore[]" class="form-control" placeholder="">
                    </div>

                    <div class="input-group-btn">
                        <br>
                        <button class="btn btn-success" type="button">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
