<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table="pacientes";
    protected $primaryKey="id";
    protected $filliable=[
    	'ci','nombre1','nombre2','apellido1','apellido2','tlf','fecha_nac','Procedencia','Referencia','Lic','historia_id'
    ];

}
