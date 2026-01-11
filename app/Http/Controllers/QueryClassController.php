<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QueryClassController extends Controller
{

    public function crossExample()
    {

        // cross join
        // $users = DB::table('users')
        //     ->crossJoin('order_statuses')
        //     ->select('users.id', 'users.name', 'order_statuses.status')
        //     ->limit(6)
        //     ->get();


        // $pending = DB::table('orders')
        //         ->select('id', 'user_id', 'total_amount','status')
        //         ->where('status', 'pending');

        // $cancelled = DB::table('orders')
        //         ->select('id', 'user_id', 'total_amount','status')
        //         ->where('status', 'cancelled');

        // $all = $pending->union($cancelled)->get();


        // $orders = DB::table('orders')
        //              ->orderBy('total_amount', 'desc')
        //              ->limit(10)
        //              ->get();

        // $users = DB::table('users')
        //              ->orderBy('name', 'ASC')
        //              ->orderBy('created_at', 'asc')
        //              ->get();


        // $users = DB::table('users')
        //             //  ->oldest('created_at')
        //              ->skip(15)
        //              ->limit(5)
        //              ->get();


        // $orders = DB::table('orders')
        //              ->select('status', DB::raw('COUNT(*) AS total_orders'))
        //              ->groupBy('status')
        //              ->get();
       
       
        // $corders = DB::table('orders')
        //              ->where('status', 'cancelled')
        //              ->get();



        // $usersTotalAmount = DB::table('orders')
        //             ->select('user_id', DB::raw('SUM(total_amount) AS total_spent'))
                    
        //             ->where('created_at', '>=', '2026-01-01 00:00:00')
        //             ->where('created_at', '<=', '2026-01-10 23:59:59')
        //             ->groupBy('user_id')
        //             ->having('total_spent', '>=', 15000)
        //             ->orderBy('total_spent', 'desc')

        //             ->limit(10)
        //              ->get();





        $users = DB::table('users')
                    ->oldest('created_at')
                     ->skip(15)
                     ->get();



        

        print '<pre>';
        print_r($users);
        print '<pre>';

        // dd($all);
    }

    public function order_create()
    {

        $user = 37;
        $total_amount = 4500;
        $status = 'pending';
        $shipping_address = 'House 10; Road: 22, Dhaka';
        $created_at = Carbon::now();
        $updated_at = Carbon::now();

        $orderData  = [
            'user_id' => $user, 
            'total_amount' => $total_amount, 
            'status' => $status, 
            'shipping_address' => $shipping_address, 
            'created_at' => $created_at, 
            'updated_at' => $updated_at, 
        ];


        $order = DB::table('orders')->insert($orderData);

        // if($order)
        
    }
    
    public function order_updated($userId, $orderId)
    {
            DB::table('orders')
                ->where('user_id', $userId)
                ->where('id', $orderId)
                ->update([
                    'status' => 'completed',
                    'updated_at' => Carbon::now(),
                ]);
    }
    
    public function user_delete($userId, $orderId)
    {
        DB::table('orders')
        ->where('user_id', $userId)
        ->where('id', $orderId)
        ->delete();
    }

}
