<?php

namespace Database\Seeders;
use App\Models\TipoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new TipoPago();
        $role->name = 'efectivo';
        $role->description = 'pagos en efectivo recibido por personas atorizadas';
        $role->save();
        $role = new TipoPago();
        $role->name = 'bancos';
        $role->description = 'pagos recibidos en las cuentas de banco existentes';
        $role->save();
    }
}
