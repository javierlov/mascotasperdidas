@extends('layouts.app')

@section('content')

<div class="container"> 
    
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>Email</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)   
                  
            <tr>
                <td>{{$user->id}} </td>
                <td>{{$user->name}} </td>
                <td>{{$user->email}} </td>
                <td><a href="{{ route('profile.edit', $user->id) }}">Editar</a>  </td>
            </tr>
            @endforeach


        </tbody>
    </table>
    Total registros : {{ $users->count()}}
    {{$users->links()}} 
</div>
@endsection 
