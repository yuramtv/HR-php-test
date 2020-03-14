<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{

    public function getAllProducts()
    {

        $products = Product::getAllProducts ();

        return view('products', ['products' => $products]);

    }

    

}
