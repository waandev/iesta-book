<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'           => 'Admin',
                'email'          => 'admin@iesta.org',
                'password'       => Hash::make('Lemb4g4IeSTA1401'),
                'remember_token' => null,
                'created_at'     => '2023-03-02 00:00:00',
                'updated_at'     => '2023-03-02 00:00:00',
            ],
        ];

        User::insert($user);
    }
}
