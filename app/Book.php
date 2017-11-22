<?php

namespace Mascotas;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //declaro campos asignables masivamente
    protected $fillable = ['id', 'name', 'pages', 'isbn'];
}
