<?php

namespace Mascotas;

use Illuminate\Database\Eloquent\Model;

class Mercaderia extends Model
{
     //a que tabla hacer referencia
    //si seguimos la conencion laravel 
    // ya hace referencia el modelo Task a la tabla tasks
    // si no hay que referenciarlo con una la variable $table ejemplo:
    protected $table = 'mercaderias'; //esto no es necesario en este caso
    //declaro campos asignables masivamente
    protected $fillable = ['id', 'codigo', 'tipo','tercero_id','estado','user_id','amount'];
    
    //campos ocultos
    protected $hidden = ['create_at'];
    
    //funcion relacion con tabla users
    public function user(){
        $this->belongsTo('Mascotas\User');
    }
    
    public function scopeSearch($query, $codigo){
        $query->where('codigo', 'LIKE', "%".$codigo."%");
        //dd($query);
    }
}
