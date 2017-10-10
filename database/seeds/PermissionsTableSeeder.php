<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deleteStaff = new Permission();
        $deleteStaff->name         = 'delete-staff';
        $deleteStaff->display_name = 'delete-staff'; // optional
// Allow a user to...
        $deleteStaff->description  = 'Delete staff member'; // optional
        $deleteStaff->save();

        $editStaff = new Permission();
        $editStaff->name         = 'edit-staff';
        $editStaff->display_name = 'Edit Staff member'; // optional
// Allow a user to...
        $editStaff->description  = 'Edit existing staff'; // optional
        $editStaff->save();

//         $admin->attachPermission($deleteStaff);
// // equivalent to $admin->perms()->sync(array($createPost->id));

//         $owner->attachPermissions(array($deleteStaff, $editStaff));
    }
}
