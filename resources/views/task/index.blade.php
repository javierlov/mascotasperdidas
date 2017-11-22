@extends('layouts.app')


@section('content')
<div class="container">
    <!-- will be used to show any messages -->

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
          @if (Session::has('message'))
            <div class="alert alert-success" role='alert'>{{ Session::get('message') }}</div>
          @endif

          <div class="panel panel-default">
            <a href="{{ route('task.create') }}" class="btn button-blue"> Crear Nueva Tarea </a> | 
            <a href="{{ route('task.index') }}" class="btn button-blue" > Listar </a> 

            <div class="input-group">
                {{ Form::open(array('url' => 'task', 'method' => 'get', 'class' => 'navbar-form pull-right')) }}
                {{Form::text('title',null,['id'=>'name','name'=>'name','class'=>'form-control','placeholder'=>'buscar nombre..','aria-describedby'=>'search'])}}
                {{ Form::submit('Buscar', array('id' => 'boton', 'class' => 'btn btn-primary ')) }}                    
                {{ Form::close() }}
            </div>

            @foreach($tasks as $task)               
            <div class="panel-heading clearfix"><b>{{$task->name}}</b>
                <div class="panel-body clearfix">{{$task->description}}
                    <p></p>
                    <b> Usuario : {{$task->user()->first()->name }} ...  </b> 
                    <b> ID : {{$task->id }} </b>  ...
                    <b> User ID : {{$task->user_id }} </b> 
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-primary btn-xs" >Editar</a>

                    {{ Form::open(array('url' => 'task/' . $task->id, 'class' => 'label')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}

                </div>
            </div>
            @endforeach
            {{$tasks->links()}}
        </div>
    </div>
</div>
</div>
@endsection
