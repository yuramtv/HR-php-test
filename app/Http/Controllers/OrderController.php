<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function getAll()
    {

        //$orders = DB::select('select `ord`.`id`,`ord`.`partner_id`,`o_p`.`price`*`o_p`.`quantity` AS `summ`,`ord`.`status` from orders ord LEFT JOIN order_products o_p ON o_p.order_id = ord.id  where status = ?', [0]);
        // ,`o_p`.`price`*`o_p`.`quantity` AS `summ`
        // LEFT JOIN order_products o_p ON o_p.order_id = ord.id
        // LEFT JOIN vendors vnd ON vendors.id = prod.vendor_id

        $products = DB::select('select `ord`.`id`,`partn`.`name`,`ord`.`status`,`prod`.`name` as `prod_name`,`o_p`.`price`,`o_p`.`quantity`,`vnd`.`name` as `vnd_name` from orders ord LEFT JOIN partners partn ON partn.id = ord.partner_id LEFT JOIN order_products o_p ON o_p.order_id = ord.id LEFT JOIN products prod ON prod.id = o_p.product_id LEFT JOIN vendors vnd ON vnd.id = prod.vendor_id where status = ?', [0]);

        // группируем массив по № ордера

        $orders = Array();

        foreach ($products as $item) {

            if($item->prod_name != NULL) {
                $orders[$item->id]['composition'][] = $item;
                $orders[$item->id]['status'] = $item->status;
                $orders[$item->id]['name'] = $item->name;
                isset($orders[$item->id]['summ'])?$orders[$item->id]['summ'] += $item->price*$item->quantity:$orders[$item->id]['summ'] = 0;
            }

            if($item->id == 1003) {
              //  var_dump($item);
            }
        }

        return view('orders', ['orders' => $orders]);

    }

}
