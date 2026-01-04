<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
 
    public function getAllusers()
    {


        $fromDate = date('2025-10-01 00-00-00');
        $toDate = date('2025-11-01 23-59-00');


        $totalUsers = DB::table('users')
        ->where('created_at', '>=', $fromDate)
            ->where('created_at', '>=', $toDate)
        ->count();        

        $users = DB::table('users')
            ->select('id', 'name', 'email', 'created_at')
            ->where('created_at', '>=', $fromDate)
            ->where('created_at', '>=', $toDate)
            ->get();

        return view('frontend.users', compact('users', 'totalUsers'));
    }
    
    
    public function getUser($user_id)
    {
        $user = DB::table('users')
            ->select('id', 'name', 'email', 'created_at')
            ->where('id', $user_id)
            ->first();

        dd($user);

        return view('frontend.users', compact('user'));
    }
    
}
