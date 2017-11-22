@extends('layouts.app')

@section('content')

<div class="container"> 
    <a href="{{ route('book.create') }}"> Ingresar book </a> 
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>pages</th>
                <th>isbn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)   
            <tr>
                <td>{{$book->id}} </td>
                <td>{{$book->name}} </td>
                <td>{{$book->pages}} </td>
                <td>{{$book->isbn}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    Total registros : {{ $books->count()}}
    {{$books->links()}} 
</div>
@endsection 
