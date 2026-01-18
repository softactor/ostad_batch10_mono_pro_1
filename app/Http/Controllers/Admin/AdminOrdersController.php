<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrdersController extends Controller
{
    
    public function getAllusersOrders()
    {

        $totalOrders = Order::count(); 

        $orders = Order::with('user', 'product')->get();

        // $orders = Order::select(
        //                 'u.id as user_id',
        //                 'u.name', 
        //                 'u.email', 
        //                 'u.created_at as user_created_at',
        //                 'o.id as order_id',
        //                 'o.total_amount',
        //                 'o.status',
        //                 'o.shipping_address',
        //                 'o.shipping_address',
        //                 'o.created_at as order_created_at',
        //                 )
        //             ->join('orders as o', 'u.id', '=', 'o.user_id')
        //             ->get();

        return view('frontend.orders', compact('orders', 'totalOrders'));
                    
    }

}
