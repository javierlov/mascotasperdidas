@extends('layouts.app')

@section('content')

<div class="container"> 
    <!--
    <a href="{{ route('tercero.create') }}">Ingresar tercero</a> 
    -->
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>id</th>
                <th>nit</th>
                <th>nombre</th>
                <th>rol</th>
                <th>direccion</th>
                <th>email</th>
                <th>notas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terceros as $tercero)   
                  
            <tr>
                <td>{{$tercero->id}} </td>
                <td>{{$tercero->nit}} </td>
                <td>{{$tercero->nombre}} </td>
                <td>{{$tercero->rol}} </td>
                <td>{{$tercero->direccion}} </td>
                <td>{{$tercero->email}} </td>
                <td>{{$tercero->notas}} </td>
            </tr>
            @endforeach


        </tbody>
    </table>
    Total registros : {{ $terceros->count()}}
    {{$terceros->links()}} 
</div>
@endsection 
