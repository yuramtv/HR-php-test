<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    static public function getAllProducts (){

        $products = DB::table('products')
            ->join('vendors', 'vendors.id', '=', 'products.vendor_id')
            ->select('products.*', 'vendors.name as vnd_name')
            ->paginate(25);

        return $products;
    }

}
