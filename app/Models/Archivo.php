<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $table="archivos";
    protected $guarded=['id','created_at','updated_at'];

    public function expedientes(){

        return $this->belongsToMany('App\Models\Expediente') ;   
        }
}
