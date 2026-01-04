<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = [];

        for ($i = 1; $i <= 50; $i++) { // ✅ অনেক ডাটা
            $users[] = [
                'name'              => "User $i",
                'email'             => "user{$i}@example.com",
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'remember_token'    => null,
                'created_at'        => Carbon::now()->subDays(rand(1, 120)),
                'updated_at'        => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}
