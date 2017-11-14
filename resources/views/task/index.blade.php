@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <a href="{{ route('task.create') }}" class="button button-blue"> Crear Nueva Tarea </a> | 
                <a href="{{ route('task.index') }}"> Listar </a> 

                {{ Form::open(array('url' => 'task', 'method' => 'get', 'class' => 'navbar-form pull-right')) }}
                <div class="input-group">
                    {{Form::text('title',null,['id'=>'name','name'=>'name','class'=>'form-control','placeholder'=>'buscar nombre..','aria-describedby'=>'search'])}}
                    <span class="input-group-addon" id="search">

                        <button type="submit" id="boton" class="glyphicon glyphicon-search">
                            Buscar
                        </button>
                    </span>
                </div>
                {{ Form::close() }}

                @foreach($tasks as $task)               
                <div class="panel-heading clearfix"><b>{{$task->name}}</b>
                    <div class="panel-body clearfix">{{$task->description}}
                        <a href="{{ route('task.edit', $task->id) }}">Editar</a> 
                    </div>
                </div>
                @endforeach
                {{$tasks->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
