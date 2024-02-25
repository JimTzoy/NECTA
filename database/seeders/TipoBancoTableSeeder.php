<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 use App\Models\TipoBanco;
class TipoBancoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bancos = [
            ['ntb' => 'MP', 'dtb' => 'Mercado Pago'],
            ['ntb' => 'BBVA', 'dtb' => 'BBVA Bancomer, S.A.'],
            ['ntb' => 'BANCOPPEL', 'dtb' => 'Banco de COPPEL'],
            ['ntb' => 'HEY BANCO', 'dtb' => 'Hey banco banregio'],
            ['ntb' => 'FINSUS', 'dtb' => 'Sofipo financiera suntentable'],
            ['ntb' => 'NU MEXICO', 'dtb' => 'Sofipo Nu '],
            ['ntb' => 'ACTIVER', 'dtb' => 'Actinver Casa de Bolsa'],
            ['ntb' => 'GBM +', 'dtb' => 'Grupo Bursatil Mexicano'],
            ['ntb' => 'FINAMEX', 'dtb' => 'Casa de Bolsa Finamex'],
            ['ntb' => 'EFECTIVO', 'dtb' => 'Dinero en efectivo'],
            // Puedes agregar más bancos con su abreviatura y descripción
        ];
    
            foreach ($bancos as $tipoBanco) {
                $nuevoTipoBanco = new TipoBanco();
                $nuevoTipoBanco->ntb = $tipoBanco['ntb'];
                $nuevoTipoBanco->dtb = $tipoBanco['dtb'];
                $nuevoTipoBanco->save();
            }
        }
}

