@extends('layouts.app')

@section('content')

<div class="container"> 
    <a href="{{ route('mercaderia.create') }}">Ingresar Mercaderia</a> 
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>id</th>
                <th>codigo</th>
                <th>tipo</th>
                <th>usuario</th>
                <th>tercero</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mercaderias as $mercaderia)   
                  
            <tr>
                <td>{{$mercaderia->id}} </td>
                <td>{{$mercaderia->codigo}} </td>
                <td>{{$mercaderia->tipo}} </td>
                <td><b> {{$mercaderia->user()->first()->name }}   </b> </td>
                <td><b>{{$mercaderia->tercero()->first()->nit }} - {{$mercaderia->tercero()->first()->nombre }}  </b> </td>
                <td><a href="{{ route('mercaderia.create', $mercaderia->id) }}">Editar</a>  </td>
            </tr>
            @endforeach


        </tbody>
    </table>
    Total registros : {{ $mercaderias->count()}}
    {{$mercaderias->links()}} 
</div>
@endsection 
