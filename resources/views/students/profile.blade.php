@extends('layouts.master')

@section('title', 'Perfil Usuario')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil Estudiante</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-info">
    <h4>

        Nombre : {{ $usr->name }}
        <p> email : {{ $usr->email }}
        <p> id : {{ $user }}
    </h4>
</div>

@endsection