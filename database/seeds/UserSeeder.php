<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Administrator';
        $user->email = 'admin@taskmanager.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user = new User;
        $user->name = 'Task Worker';
        $user->email = 'taskworker@taskmanager.com';
        $user->password = bcrypt('123456');
        $user->save();


        $admin = Role::where('name','Administrator')->first();
        $user->attachRole($admin);

        $taskworker = Role::where('name','Task Worker')->first();
        $user->attachRole($taskworker);

    }
}
