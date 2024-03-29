@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth()->check() && Auth()->user()->role == 'admin')
                        You are logged in as The Admin!
                    @else
                        You're just logged in!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
