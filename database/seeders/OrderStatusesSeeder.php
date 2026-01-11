<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_statuses')->truncate();

        DB::table('order_statuses')->insert([
            ['status' => 'pending',   'created_at' => now(), 'updated_at' => now()],
            ['status' => 'completed', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'cancelled', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
