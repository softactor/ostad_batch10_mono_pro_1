<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // If you have FK constraints, keep this order: orders truncate আগে, তারপর users
        // But we will truncate from DatabaseSeeder with FK off.
        DB::table('users')->delete();

        $now = now();
        $users = [];

        for ($i = 1; $i <= 50; $i++) {
            $users[] = [
                'name' => "User {$i}",
                'email' => "user{$i}@example.com",
                'email_verified_at' => $now->copy()->subDays(rand(1, 120)),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => $now->copy()->subDays(rand(1, 180)),
                'updated_at' => $now,
            ];
        }

        DB::table('users')->insert($users);
    }
}
