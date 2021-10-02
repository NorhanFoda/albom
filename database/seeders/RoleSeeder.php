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
        $user = $roleRepository->create(['name' => 'user']);


        // Users management role and permissions
        $users_management = $roleRepository->create(['name' => 'users_management']);
        $permissionRepository->create(['name' => 'list_users']);
        $permissionRepository->create(['name' => 'edit_users']);
        $permissionRepository->create(['name' => 'show_users']);
        $permissionRepository->create(['name' => 'delete_users']);

        $users_management->givePermissionTo(['list_users', 'edit_users', 'show_users', 'delete_users']);


        $roles_management = $roleRepository->create(['name' => 'roles_management']);
        $permissionRepository->create(['name' => 'list_roles']);
        $permissionRepository->create(['name' => 'create_roles']);
        $permissionRepository->create(['name' => 'edit_roles']);
        $permissionRepository->create(['name' => 'delete_roles']);

        $roles_management->givePermissionTo(['list_roles', 'edit_roles', 'create_roles', 'delete_roles']);

        $emps_management = $roleRepository->create(['name' => 'employee_management']);
        $permissionRepository->create(['name' => 'list_employees']);
        $permissionRepository->create(['name' => 'create_employees']);
        $permissionRepository->create(['name' => 'edit_employees']);
        $permissionRepository->create(['name' => 'delete_employees']);

        $emps_management->givePermissionTo(['list_employees', 'edit_employees', 'create_employees', 'delete_employees']);

        $alboms_management = $roleRepository->create(['name' => 'alboms_management']);
        $permissionRepository->create(['name' => 'list_alboms']);
        $permissionRepository->create(['name' => 'show_alboms']);
        $permissionRepository->create(['name' => 'delete_alboms']);

        $alboms_management->givePermissionTo(['list_alboms', 'show_alboms', 'delete_alboms']);

        $images_management = $roleRepository->create(['name' => 'images_management']);
        $permissionRepository->create(['name' => 'delete_images']);

        $images_management->givePermissionTo(['delete_images']);

        $admin->givePermissionTo($permissionRepository->getAll());
        

    }
}
