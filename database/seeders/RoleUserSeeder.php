<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'Admin')->first();
        $role = Role::where('name', 'Admin')->first();

        // dd($user->id);
        // dd($role->id);

        if ($user && $role) {
            // Tambahkan role_user
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => $role->id,
                'created_at' => Carbon::now('Asia/Makassar'),
                'updated_at' => Carbon::now('Asia/Makassar'),
            ]);
        }
    }
}
