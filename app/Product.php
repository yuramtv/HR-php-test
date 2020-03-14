<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    static public function getAllProducts (){

        $products = self::all();

        $out = Array();

        foreach ($products as $product) {
            $out[$product->id] = $product->name;
        }

        return $out;
    }
}
