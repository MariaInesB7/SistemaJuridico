<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abogado extends Model
{
    use HasFactory;
    protected $table="abogados";
    protected $guarded=['id','created_at','updated_at'];

    //relacion muchos a muchos
    public function expedientes(){
        return $this->belongsToMany('App\Models\Expediente');
    }
}
