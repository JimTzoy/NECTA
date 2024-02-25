<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBanco extends Model
{
    use HasFactory;
    // Otras propiedades y métodos del modelo

    public function ingresosxbanco()
    {
        return $this->hasMany(Ingresos::class, 'tpb_id');
    }

    public function gastosxbanco()
    {
        return $this->hasMany(Gastos::class, 'tpb_id');
    }
    public function ingresos()
    {
        return $this->hasMany(Ingresos::class, 'tpb_id');
    }

    public function gastos()
    {
        return $this->hasMany(Gastos::class, 'tpb_id');
    }
    
}
