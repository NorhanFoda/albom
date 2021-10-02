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
        $employee = $roleRepository->create(['name' => 'employee']);
        $user = $roleRepository->create(['name' => 'user']);


        // Users management role and permissions
        $users_management = $roleRepository->create(['name' => 'users management']);
        $permissionRepository->create(['name' => 'list users']);
        $permissionRepository->create(['name' => 'edit users']);
        $permissionRepository->create(['name' => 'show users']);
        $permissionRepository->create(['name' => 'delete users']);

        $users_management->givePermissionTo(['list users', 'edit users', 'show users', 'delete users']);


        $roles_management = $roleRepository->create(['name' => 'roles management']);
        $permissionRepository->create(['name' => 'list roles']);
        $permissionRepository->create(['name' => 'create roles']);
        $permissionRepository->create(['name' => 'edit roles']);
        $permissionRepository->create(['name' => 'show roles']);
        $permissionRepository->create(['name' => 'delete roles']);

        $roles_management->givePermissionTo(['list roles', 'edit roles', 'create roles', 'delete roles']);

        $emps_management = $roleRepository->create(['name' => 'employee management']);
        $permissionRepository->create(['name' => 'list employees']);
        $permissionRepository->create(['name' => 'create employees']);
        $permissionRepository->create(['name' => 'edit employees']);
        $permissionRepository->create(['name' => 'show employees']);
        $permissionRepository->create(['name' => 'delete employees']);

        $emps_management->givePermissionTo(['list employees', 'edit employees', 'create employees', 'delete employees']);

        $alboms_management = $roleRepository->create(['name' => 'alboms management']);
        $permissionRepository->create(['name' => 'list alboms']);
        $permissionRepository->create(['name' => 'show alboms']);
        $permissionRepository->create(['name' => 'delete alboms']);

        $alboms_management->givePermissionTo(['list alboms', 'show alboms', 'delete alboms']);

        $images_management = $roleRepository->create(['name' => 'images management']);
        $permissionRepository->create(['name' => 'delete images']);

        $images_management->givePermissionTo(['delete images']);

        $admin->givePermissionTo($permissionRepository->getAll());
        

    }
}
