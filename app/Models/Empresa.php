<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id'
        ,'NomComercial'
        ,'NomFiscal'
        ,'Rfc'
        ,'Telefono'
        ,'Direccion'
        ,'Ciudad'
        ,'CodigoPostal'
        ,'Pais'
        ,'Correo'
        ,'user_id'
        ,'created_at'
        ,'updated_at'
    ];
}
