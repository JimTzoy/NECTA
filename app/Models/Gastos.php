<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'user_id',
        'tpg_id',
        'tpb_id',
        'created_at',
        'updated_at',
    ];
    // Otras propiedades y métodos del modelo

    public function tipoBanco()
    {
        return $this->belongsTo(TipoBanco::class, 'tpb_id'); // Reemplaza 'TipoBancos' por el nombre correcto de tu modelo
    }

    public function tipoGasto()
    {
        return $this->belongsTo(TipoGasto::class, 'tpg_id'); // Reemplaza 'TipoGastos' por el nombre correcto de tu modelo
    }
    public function banco()
    {
        return $this->belongsTo(TipoBanco::class, 'tpb_id');
    }
}
