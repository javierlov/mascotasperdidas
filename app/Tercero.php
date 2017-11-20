<?php

namespace Mascotas;

use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    protected $table = 'terceros'; //esto no es necesario en este caso
    //declaro campos asignables masivamente
    protected $fillable = ['id','nit','nombre', 'rol', 'direccion','email','notas'];
}
