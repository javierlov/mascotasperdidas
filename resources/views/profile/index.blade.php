@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            Total registros : {{ $tasks->count()}}
            <div class="panel panel-default">
                @foreach($tasks as $task)               
                <div class="panel-heading clearfix">{{$task->name}} 
                    <div class="panel-body clearfix">{{$task->id}} - 
                        {{$task->name}} - 
                        {{$task->description}}
                        <a href="{{ route('profile.edit', $task->id) }}">Editar</a> 
                    </div>
                </div>
                @endforeach
                {{$tasks->links()}} 

            </div>
        </div>
    </div>
</div>
@endsection 
