<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function getAllProducts()
    {

        $products = Product::getAllProducts ();

        return view('products', ['products' => $products]);

    }

    public function savePrice (Request $request) {

        //dump($request->all());

        if( ($request->post('id') != null) and $request->post('new_price') != null) {

            $id = $request->post('id');
            $new_price = $request->post('new_price');

            $products = Product::find($id);
            $products->price = $new_price;
            $products->save();

            $result = "Сохранено!";
        } else {

            $result = "Отсутствуют POST-данные";
        }

        return $result;
    }

}
