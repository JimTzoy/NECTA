<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoIngreso;
class TipoIngresoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiposDeIngreso = [
            ['nti' => 'Sueldo o salario de empleo', 'dti' => 'Ingresos obtenidos como compensación por trabajo en empleo fijo.'],
            ['nti' => 'Honorarios profesionales', 'dti' => 'Ingresos provenientes de servicios profesionales prestados.'],
            ['nti' => 'Bonificaciones o comisiones', 'dti' => 'Ingresos adicionales basados en bonificaciones o comisiones por ventas o logros específicos.'],
            ['nti' => 'Ganancias provenientes de un negocio propio', 'dti' => 'Ingresos generados por un negocio en propiedad del individuo.'],
            ['nti' => 'Ingresos de ventas de productos o servicios', 'dti' => 'Ingresos obtenidos por la venta de bienes o servicios.'],
            ['nti' => 'Intereses obtenidos de cuentas de ahorro', 'dti' => 'Ingresos generados por intereses acumulados en cuentas de ahorro o inversión.'],
            ['nti' => 'Dividendos de acciones', 'dti' => 'Ingresos distribuidos a los accionistas por parte de una empresa en forma de dividendos.'],
            ['nti' => 'Ganancias de la venta de activos financieros', 'dti' => 'Ingresos obtenidos por la venta de acciones, bonos u otros activos financieros.'],
            ['nti' => 'Alquileres de propiedades inmobiliarias', 'dti' => 'Ingresos provenientes del alquiler de propiedades inmobiliarias.'],
            ['nti' => 'Ingresos de alquileres de bienes muebles', 'dti' => 'Ingresos obtenidos por el alquiler de bienes muebles como equipos, vehículos, etc.'],
            ['nti' => 'Pagos de jubilación por parte de una entidad o programa de pensiones', 'dti' => 'Ingresos de jubilación provenientes de un programa o entidad de pensiones.'],
            ['nti' => 'Ingresos de planes de jubilación privados', 'dti' => 'Ingresos de jubilación provenientes de planes de jubilación privados.'],
            ['nti' => 'Ingresos provenientes de trabajos temporales o freelance', 'dti' => 'Ingresos obtenidos de trabajos temporales o freelance.'],
            ['nti' => 'Ingresos por trabajos esporádicos o consultorías', 'dti' => 'Ingresos provenientes de trabajos esporádicos o servicios de consultoría.'],
            ['nti' => 'Ingresos por derechos de autor de libros, música, arte, etc.', 'dti' => 'Ingresos obtenidos por derechos de autor de obras creativas.'],
            ['nti' => 'Regalías por el uso de propiedad intelectual', 'dti' => 'Ingresos generados por el uso de propiedad intelectual.'],
            ['nti' => 'Ayudas económicas del gobierno', 'dti' => 'Ingresos proporcionados por el gobierno en forma de ayudas económicas.'],
            ['nti' => 'Subsidios por desempleo o discapacidad', 'dti' => 'Ingresos proporcionados por el gobierno en forma de subsidios por desempleo o discapacidad.'],
            ['nti' => 'Ingresos provenientes de herencias recibidas', 'dti' => 'Ingresos recibidos como herencia de bienes o dinero.'],
            ['nti' => 'Donaciones o regalos de terceros', 'dti' => 'Ingresos recibidos en forma de donaciones o regalos de terceros.'],
            ['nti' => 'Cualquier otra fuente de ingresos que no encaje en las categorías anteriores', 'dti' => 'Ingresos provenientes de fuentes diversas que no se clasifican en las categorías anteriores.'],
        ];

        foreach ($tiposDeIngreso as $tipoIngreso) {
            $nuevoTipoIngreso = new TipoIngreso();
            $nuevoTipoIngreso->nti = $tipoIngreso['nti'];
            $nuevoTipoIngreso->dti = $tipoIngreso['dti'];
            $nuevoTipoIngreso->save();
        }
    }
}
