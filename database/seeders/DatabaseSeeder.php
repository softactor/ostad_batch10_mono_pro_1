<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // child tables first
        DB::table('orders')->truncate();
        DB::table('user_logs')->truncate(); // যেহেতু users কে reference করে

        // parent last
        DB::table('users')->truncate();

        Schema::enableForeignKeyConstraints();

        $this->call([
            UsersTableSeeder::class,
            OrdersTableSeeder::class,
        ]);
    }
}
