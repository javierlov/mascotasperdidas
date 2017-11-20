<?php

namespace Mascotas;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    //a que tabla hacer referencia
    //si seguimos la conencion laravel 
    // ya hace referencia el modelo Task a la tabla tasks
    // si no hay que referenciarlo con una la variable $table ejemplo:
    protected $table = 'tasks'; //esto no es necesario en este caso
    //declaro campos asignables masivamente
    protected $fillable = ['name', 'description', 'user_id'];
    
    //campos ocultos
    protected $hidden = ['create_at'];
    
    //funcion relacion con tabla users
    public function user(){
        $this->belongsTo('Mascotas\User');
    }
    
    public function scopeSearch($query, $name){
        $query->where('name', 'LIKE', "%".$name."%");
        //dd($query);
    }

     public function scopeSearchUserId($query, $id){
        $id=12;
        dd($id);
        $query->where('user_ir', '=', $id);
    }
}
