@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$task->name}}</div>

                <div class="panel-body">
                    <strong>Descripcion :  </strong> <p>{{$task->description}}</p>
                </div>
                
                 <div class="panel-footer clearfix">
                     <p><a class="pull-right" href="{{route('task.edit', $task->id)}}">Editar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
