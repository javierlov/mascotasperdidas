<?php

namespace Mascotas;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    //a que tabla hacer referencia
    //si seguimos la conencion laravel 
    // ya hace referencia el modelo Task a la tabla tasks
    // si no hay que referenciarlo con una la variable $table ejemplo:

    // https://laravel.montogeek.com/5.0/eloquent#querying-relations

    protected $table = 'tasks'; //esto no es necesario en este caso
    //declaro campos asignables masivamente
    protected $fillable = ['name', 'description', 'user_id','updated_at'];
    
    //campos ocultos
    protected $hidden = ['create_at'];
    
     protected $dates = [
        'created_at',
        'updated_at'
    ];

    //funcion relacion con tabla users
    public function user(){
        // $this->belongsTo('Mascotas\User');
        return $this->belongsTo('Mascotas\User');
    }
    
    public function scopeSearch($query, $name){
        $query->where('name', 'LIKE', "%".$name."%");
        //dd($query);
    }

    public function scopeSearchUserId($query, $id){
        $id = Auth::user()->id; 
        $query->where('user_id', '=', $id);
    }


    public function scopeSearchName($query){
        $name = Auth::user()->name; 
        $query->where('name', '=', $name);
    }

}
