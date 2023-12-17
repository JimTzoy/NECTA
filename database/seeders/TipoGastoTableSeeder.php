<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoGasto;

class TipoGastoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiposDeGasto = [
            ['ntg' => 'Alquiler o hipoteca', 'dtg' => 'Gastos de Vivienda'],
            ['ntg' => 'Servicios públicos (agua, electricidad, gas)', 'dtg' => 'Gastos de Vivienda'],
            ['ntg' => 'Mantenimiento del hogar', 'dtg' => 'Gastos de Vivienda'],
            ['ntg' => 'Compras de supermercado', 'dtg' => 'Alimentación'],
            ['ntg' => 'Comidas en restaurantes', 'dtg' => 'Alimentación'],
            ['ntg' => 'Alimentos para llevar', 'dtg' => 'Alimentación'],
            ['ntg' => 'Gasolina', 'dtg' => 'Transporte'],
            ['ntg' => 'Transporte público', 'dtg' => 'Transporte'],
            ['ntg' => 'Mantenimiento del vehículo', 'dtg' => 'Transporte'],
            ['ntg' => 'Consultas médicas', 'dtg' => 'Salud'],
            ['ntg' => 'Medicamentos', 'dtg' => 'Salud'],
            ['ntg' => 'Seguro médico', 'dtg' => 'Salud'],
            ['ntg' => 'Salidas', 'dtg' => 'Entretenimiento'],
            ['ntg' => 'Suscripciones a plataformas de entretenimiento', 'dtg' => 'Entretenimiento'],
            ['ntg' => 'Actividades recreativas', 'dtg' => 'Entretenimiento'],
            ['ntg' => 'Matrícula o colegiaturas', 'dtg' => 'Educación'],
            ['ntg' => 'Materiales educativos', 'dtg' => 'Educación'],
            ['ntg' => 'Cursos o clases adicionales', 'dtg' => 'Educación'],
            ['ntg' => 'Pagos de tarjetas de crédito', 'dtg' => 'Deudas'],
            ['ntg' => 'Préstamos personales', 'dtg' => 'Deudas'],
            ['ntg' => 'Deudas pendientes', 'dtg' => 'Deudas'],
            ['ntg' => 'Contribuciones a cuentas de ahorro', 'dtg' => 'Ahorros e Inversiones'],
            ['ntg' => 'Inversiones en Acciones', 'dtg' => 'Ahorros e Inversiones'],
            ['ntg' => 'Planes de jubilación', 'dtg' => 'Ahorros e Inversiones'],
            ['ntg' => 'Renta Fija o Instrumentos de Deuda', 'dtg' => 'Ahorros e Inversiones'],
            ['ntg' => 'SOFIPOS (Sociedades Financieras Populares)', 'dtg' => 'Ahorros e Inversiones'],
            ['ntg' => 'Dividendos y Rendimientos', 'dtg' => 'Ahorros e Inversiones'],
            ['ntg' => 'Gastos operativos', 'dtg' => 'Negocio'],
            ['ntg' => 'Publicidad', 'dtg' => 'Negocio'],
            ['ntg' => 'Equipamiento', 'dtg' => 'Negocio'],
            ['ntg' => 'Gastos imprevistos', 'dtg' => 'Otros'],
            ['ntg' => 'Regalos', 'dtg' => 'Otros'],
            ['ntg' => 'Donaciones', 'dtg' => 'Otros'],
        ];

        foreach ($tiposDeGasto as $tipoGasto) {
            $nuevoTipoGasto = new TipoGasto();
            $nuevoTipoGasto->ntg = $tipoGasto['ntg'];
            $nuevoTipoGasto->dtg = $tipoGasto['dtg'];
            $nuevoTipoGasto->save();
        }
    }
}

