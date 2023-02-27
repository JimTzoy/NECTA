<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    use HasFactory;

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class)->withTimestamps()->wherePivot(['nombre','img','FechaInicio','FechaFin']);
    }
}
