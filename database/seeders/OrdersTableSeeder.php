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
        DB::table('orders')->delete();

        $statuses = ['pending', 'completed', 'cancelled'];
        $areas = ['Mirpur', 'Dhanmondi', 'Uttara', 'Mohakhali', 'Badda', 'Gulshan', 'Farmgate', 'Motijheel'];
        $now = now();

        $orders = [];

        // Users 1-40 will have orders, Users 41-50 will have NO orders (LEFT JOIN demo)
        for ($i = 1; $i <= 400; $i++) {

            $userId = rand(1, 40);

            $amount = rand(200, 12000); // helpful for group/having examples

            $status = $statuses[array_rand($statuses)];

            $orders[] = [
                'user_id' => $userId,
                'total_amount' => number_format($amount, 2, '.', ''),
                'status' => $status,
                'shipping_address' => "House " . rand(1, 120) . ", Road " . rand(1, 40) . ", " . $areas[array_rand($areas)] . ", Dhaka",
                'created_at' => $now->copy()->subDays(rand(0, 120))->subMinutes(rand(0, 1440)),
                'updated_at' => $now,
            ];
        }

        DB::table('orders')->insert($orders);
    }
}
