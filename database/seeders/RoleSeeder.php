<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            [
                'name'           => 'Customer',
                'created_at'     => Carbon::now('Asia/Makassar'),
                'updated_at'     => Carbon::now('Asia/Makassar'),
            ],
            [
                'name'           => 'Admin',
                'created_at'     => Carbon::now('Asia/Makassar'),
                'updated_at'     => Carbon::now('Asia/Makassar'),
            ],
        ];

        Role::insert($role);
    }
}
