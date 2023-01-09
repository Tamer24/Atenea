@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Carga de Datos') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        Cargar Abigeato
                    </div>
                    <div class="alert alert-success" role="alert">
                        Cargar Homicidios
                    </div>
                    <div class="alert alert-success" role="alert">
                        Cargar Robos
                    </div>
                    <div class="alert alert-success" role="alert">
                        Cargar Estafas Ciberneticas
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
