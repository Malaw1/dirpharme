@extends('layouts.layout')

@section('content')

<div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">Recevabilite</h4>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom du Produit</th>
                    <th>Labo Demandeur</th>
                    <th>Classe Therapeutique</th>
                    <th>Presentation</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Code</th>
                    <th>Nom du Produit</th>
                    <th>Labo Demandeur</th>
                    <th>Classe Therapeutique</th>
                    <th>Presentation</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($received as $receive)
                <tr>
                    <td>{{ $receive->code }}</td>
                    <td>{{ $receive->nom_medicament }}</td>
                    <td>{{ $receive->labo }}</td>
                    <td>{{ $receive->classe_therapeutique }}</td>
                    <td>{{ $receive->presentation }}</td>
                    <td>{{ $receive->status }}</td>
                    <td>
                        <button class="item" disabled data-toggle="tooltip" data-placement="top" title="">
                            <i class=""><a href="{{ url('/recevabilite/create?id='. $receive->id) }}">Remplir la Grille</a></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
