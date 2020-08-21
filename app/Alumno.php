<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = ["name", "lastname", "email", "state", "peruvian", "assistance", "phone", "idCompany"]; 
    // la propiedad "$fillable" recibe un arreglo  y le dice a Laravel que columnas que se pueden llenar

    // protected $guarded = []; // la propiedad " protected $guarded"  recibe un arreglo y le dice a laravel que campos no se deben de llenar


    // adicionalmente le debemos decir a Laravel que la columna "idCompany" es una llave foranea
    public function company() {
        return $this->belongsTo('App\Empresa', 'idCompany'); // ralacionamos
                                // Modelo      campo DB/atributo del modelo
    }
}
