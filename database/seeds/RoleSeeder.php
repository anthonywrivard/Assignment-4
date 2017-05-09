<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();


        $admin = new Role();
        $admin->name         = 'task worker';
        $admin->display_name = 'Task Worker'; // optional
        $admin->description  = 'User is allowed to work on tasks given'; // optional
        $admin->save();

    }
}
