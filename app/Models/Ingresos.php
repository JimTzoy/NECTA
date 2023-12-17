<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    use HasFactory;  
    protected $fillable = [
        'cantidad',
        'user_id',
        'tpi_id',
        'tpb_id',
        'created_at',
        'updated_at',
    ];
    // Otras propiedades y métodos del modelo

    public function tipoBanco()
    {
        return $this->belongsTo(TipoBanco::class, 'tpb_id'); // Reemplaza 'TipoBancos' por el nombre correcto de tu modelo
    }

    public function tipoIngreso()
    {
        return $this->belongsTo(TipoIngreso::class, 'tpi_id'); // Reemplaza 'TipoGastos' por el nombre correcto de tu modelo
    }
    public function banco()
    {
        return $this->belongsTo(TipoBanco::class, 'tpb_id');
    }
}
