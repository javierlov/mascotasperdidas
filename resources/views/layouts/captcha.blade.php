<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Captcha con Laravel 5</title>
</head>
<body>

 {!! Form::open(array('url' => '/send_info')) !!}
        <p>{!! Captcha::img(); !!}</p>
        <p>{{Form::text('captcha', null, ['id'=>'captcha', 'name'=>'name', 'class'=>'form-control', 'placeholder'=>'captcha..'])}}</p>
        <p>{!! Form::submit('Enviar') !!}</p>
    {!! Form::close() !!}
 
    @if ($errors->has('captcha'))
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

</body>
</html>