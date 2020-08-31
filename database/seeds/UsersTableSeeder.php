<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$kmdSiVstl7Z4rRxd.uL48u3QZm5w9SKC3IahYii8t1gj4PS3Ujg9y',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
