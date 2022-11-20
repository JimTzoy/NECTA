<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','NoCliente','Nombre','ApPaterno','ApMaterno','Telefono','Direccion','Ciudad','Descripcion','FechaContrato','idAntena','plan_id','user_id','zona_id','created_at','updated_at'
    ];
}
