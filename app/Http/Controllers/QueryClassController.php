<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryClassController extends Controller
{

    public function crossExample()
    {
        $status = collect([
            ['status' => 'pending'],
            ['status' => 'completed'],
            ['status' => 'cancelled'],
        ]);

        $statusQuery = DB::query()->fromSub(function ($query) use ($status) {
            foreach ($status as $row) {
                $query->selectRaw("? as status", [$row['status']]);
            }
        }, 'status_values');

        $users = DB::table('users')
            ->crossJoinSub($status, 's')
            ->select('users.id', 'users.name', 's.status')
            ->limit(20)
            ->get();

        dd($users);
    }

}
