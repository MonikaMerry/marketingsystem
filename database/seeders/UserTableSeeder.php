<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name              = 'Admin';
        $user->email             = 'admin@gmail.com';
        $user->is_admin          = 1;
        $user->active_user       = 0;
        $user->email_verified_at = now()->toDateTimeString();
        $user->password          = Hash::make('qwerty');
        $user->save();
    }
}
