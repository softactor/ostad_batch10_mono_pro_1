<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('orders')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $statuses = ['pending', 'completed', 'cancelled'];
        $orders   = [];

        // Users 1–40 will have orders, 41–50 no orders (LEFT JOIN demo)
        for ($userId = 1; $userId <= 40; $userId++) {

            // Each user has 2–8 orders (✅ অনেক order)
            $orderCount = rand(2, 8);

            for ($i = 1; $i <= $orderCount; $i++) {
                $orders[] = [
                    'user_id'          => $userId,
                    'total_amount'     => rand(200, 15000), // ✅ range বড়
                    'status'           => $statuses[array_rand($statuses)],
                    'shipping_address' => "House " . rand(1, 200) . ", Road " . rand(1, 60) . ", Dhaka",
                    'created_at'       => Carbon::now()->subDays(rand(1, 180)),
                    'updated_at'       => now(),
                ];
            }
        }

        DB::table('orders')->insert($orders);
    }
}
