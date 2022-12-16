<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profesorRole = Role::create(['name' => 'User']);
        $rmiRole = Role::create(['name' => 'RMI']);
        $adminRole = Role::create(['name' => 'Admin']);

        Permission::create(['name' => 'admin.index'])->syncRoles([$profesorRole, $adminRole, $rmiRole]);
        Permission::create(['name' => 'user.index'])->syncRoles([$profesorRole, $adminRole, $rmiRole]);
        Permission::create(['name' => 'user.create'])->syncRoles([$profesorRole, $adminRole, $rmiRole]);
        Permission::create(['name' => 'user.edit'])->syncRoles([$profesorRole, $adminRole, $rmiRole]);
        Permission::create(['name' => 'user.destroy'])->syncRoles([$profesorRole, $adminRole, $rmiRole]);

        Permission::create(['name' => 'admin.gestiontickets.index'])->syncRoles([$adminRole, $rmiRole]);
        Permission::create(['name' => 'admin.gestiontickets.create'])->syncRoles([$adminRole, $rmiRole]);
        Permission::create(['name' => 'admin.gestiontickets.edit'])->syncRoles([$adminRole, $rmiRole]);
        Permission::create(['name' => 'admin.gestiontickets.destroy'])->syncRoles([$adminRole]);

        Permission::create(['name' => 'admin.gestionusers.index'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'admin.gestionusers.create'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'admin.gestionusers.edit'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'admin.gestionusers.destroy'])->syncRoles([$adminRole]);

    }
}
