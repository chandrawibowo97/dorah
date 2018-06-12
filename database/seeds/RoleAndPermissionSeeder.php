<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleMember = Role::create(['name' => 'member']);

        $permissionCreateEvent = Permission::create(['name' => 'create event']);
        $permissionDeleteEvent = Permission::create(['name' => 'delete event']);
        $permissionCreatePMIBranch = Permission::create(['name' => 'create pmi branch']);
        $permissionDeletePMIBranch = Permission::create(['name' => 'delete pmi branch']);
        $permissionViewMap = Permission::create(['name' => 'view map']);

        $permissionCreateEvent->assignRole($roleAdmin);
        $permissionDeleteEvent->assignRole($roleAdmin);
        $permissionCreatePMIBranch->assignRole($roleAdmin);
        $permissionDeletePMIBranch->assignRole($roleAdmin);
        $permissionViewMap->assignRole($roleMember);

        $user = User::find(1);
        $user->assignRole($roleAdmin);
    }
}
