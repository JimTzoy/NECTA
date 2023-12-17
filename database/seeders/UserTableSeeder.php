<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_empresa = Role::where('name', 'empresa')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_cliente = Role::where('name', 'cliente')->first();
        $role_finanzas = Role::where('name', 'finanzas')->first();
        $user = new User();
        $user->name = 'Danae';
        $user->email = 'danae@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('nectadanae');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'Daniel';
        $user->email = 'daniel@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('nectadaniel');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'victor';
        $user->email = 'victor@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('nectavictor');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'Hector Samuel';
        $user->email = 'administrador@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('nectahector');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'Francisco';
        $user->email = 'francisco@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('nectafrancisco');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'Necta';
        $user->email = 'necta@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('necta1234');
        $user->save();
        $user->roles()->attach($role_empresa);
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('necta1234');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Cliente';
        $user->email = 'cliente@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('necta1234');
        $user->save();
        $user->roles()->attach($role_cliente);
        $user = new User();
        $user->name = 'HECTOR SAMUEL';
        $user->email = 'hectorsamu@outlook.com';
        $user->img = 'user.png';
        $user->password = bcrypt('necta1234');
        $user->save();
        $user->roles()->attach($role_finanzas);
        
    }
}
