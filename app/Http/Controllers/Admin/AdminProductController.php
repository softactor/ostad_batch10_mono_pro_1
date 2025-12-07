<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('backend.product.list', compact('products'));

    }
    
    public function create()
    {

        return view('backend.product.create');

    }
}
