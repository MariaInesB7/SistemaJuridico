<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    protected $table="expedientes";
    protected $guarded=['id','created_at','updated_at'];

    public function clientes(){

        return $this->belongsToMany('App\Models\Cliente') ;   
        }
        
        public function abogados(){
            return $this->belongsToMany('App\Models\Abogado');
        }
}
 
