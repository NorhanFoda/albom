<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRepository = App::make('App\Repositories\UserRepositoryInterface');

        $user = $userRepository->create(
            [
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'password' => bcrypt('123456')
            ],
        );

        $user->assignRole('admin');
    }
}
