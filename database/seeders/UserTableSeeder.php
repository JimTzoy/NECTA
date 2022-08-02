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
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'Danae';
        $user->email = 'danae@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('nectadanae');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Hector Samuel';
        $user->email = 'administrador@somosnecta.com.mx';
        $user->img = 'user.png';
        $user->password = bcrypt('nectahector');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
