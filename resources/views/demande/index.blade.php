@extends('layouts.layout')

@section('content')

    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">Tableau des demandes</h4>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Code</th>
                    <th>Nom Commercial</th>
                    <th>Titulaire de l'AMM</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Type</th>
                    <th>Code</th>
                    <th>Nom Commercial</th>
                    <th>Titulaire de l'AMM</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($demande as $demande)
                <tr>
                    <td>{{ $demande->type }}</td>
                    <td>{{ $demande->code }}</td>
                    <td>{{ $demande->nom_medicament }}</td>
                    @if($demande->role == 'labo')
                        <td>------------</td>
                    @else
                        <td>{{ $demande->labo }}</td>
                    @endif

                    @if($demande->status == 'Acceptée')
                        <td><span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">{{ $demande->status }}</span></td>
                    @elseif($demande->status == 'Rejetée')
                        <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">{{ $demande->status }}</span></td>
                    @else
                        <td><span class="badge bgc-yellow-50 c-yellow-700 p-10 lh-0 tt-c badge-pill">{{ $demande->status }}</span></td>
                    @endif
                    <td>
                        <a href="{{ url('/demande/' . $demande->id) }}" class="btn btn-action btn-secondary">Detail</a>

                        @if(Auth()->check() && Auth()->user()->role != 'pharmacien')

                            <button class="item" disabled data-toggle="tooltip" data-placement="top" title="Suivre">
                                <i class=""><a href="{{ url('/demande/create?id=' . $demande->id) }}">Suivre</a></i>
                            </button>

                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

