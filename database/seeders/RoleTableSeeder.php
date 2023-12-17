<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrador de la pagina ';
        $role->save();
        $role = new Role();
        $role->name = 'empresa';
        $role->description = 'Puede crear un empresa y clientes y llevar un control';
        $role->save();
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User para otras ideas de la pagina ';
        $role->save();
        $role = new Role();
        $role->name = 'cliente';
        $role->description = 'usuario registrado por la empresa para mostrarle sus recibos';
        $role->save();
        $role = new Role();
        $role->name = 'cobrador';
        $role->description = 'usuario registrado por la empresa para cobrar';
        $role->save();
        $role = new Role();
        $role->name = 'tecnico';
        $role->description = 'usuario registrado por la empresa para cobrar';
        $role->save();
        $role = new Role();
        $role->name = 'finanzas';
        $role->description = 'usuario registrado por la empresa para cobrar';
        $role->save();
    }
}
