<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2024-02-12 18:16:35',
                'verification_token' => '',
                'two_factor_code'    => '',
                'first_name'         => '',
                'last_name'          => '',
            ],
        ];

        User::insert($users);
    }
}
