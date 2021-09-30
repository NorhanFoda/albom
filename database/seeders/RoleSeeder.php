<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleRepository = App::make('App\Repositories\RoleRepositoryInterface');
        $permissionRepository = App::make('App\Repositories\PermissionRepositoryInterface');

        // Admin
        $admin = $roleRepository->create(['name' => 'admin']);


        // Users management role and permissions
        $users_management = $roleRepository->create(['name' => 'users_management']);
        $permissionRepository->create(['name' => 'list_users']);
        $permissionRepository->create(['name' => 'edit_users']);
        $permissionRepository->create(['name' => 'delete_users']);

        $users_management->givePermissionTo(['list_users', 'edit_users', 'delete_users']);


        $roles_management = $roleRepository->create(['name' => 'roles_management']);
        $alboms_management = $roleRepository->create(['name' => 'alboms_management']);

        $admin->givePermissionTo($permissionRepository->getAll());
        

    }
}
