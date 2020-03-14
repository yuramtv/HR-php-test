<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    static public function GetOrders ($order_id = null, $status = null) {

        $condition = 1;

        if($order_id !=null) { $condition .= " AND `ord`.`id` =".$order_id;  }

        $products = DB::select('SELECT `ord`.`id`,`partn`.`id` AS `partner_id`,`partn`.`name` AS `partner_name`,`ord`.`client_email`,`ord`.`status`,`prod`.`name` AS `prod_name`,`o_p`.`price`,`o_p`.`quantity`,`vnd`.`name` AS `vnd_name` FROM orders ord LEFT JOIN partners partn ON partn.id = ord.partner_id LEFT JOIN order_products o_p ON o_p.order_id = ord.id LEFT JOIN products prod ON prod.id = o_p.product_id LEFT JOIN vendors vnd ON vnd.id = prod.vendor_id WHERE '.$condition );

        // группируем массив по № ордера

        $order = Array();

        foreach ($products as $item) {

            if($item->prod_name != NULL) {
                //$order[$item->id]['id'][] = $item->id;
                $order[$item->id]['composition'][] = $item;
                $order[$item->id]['status'] = $item->status;
                $order[$item->id]['partner_id'] = $item->partner_id;
                $order[$item->id]['partner_name'] = $item->partner_name;
                $order[$item->id]['email'] = $item->client_email;
                isset($order[$item->id]['summ'])?$order[$item->id]['summ'] += $item->price*$item->quantity:$order[$item->id]['summ'] = 0;
            }
        }

        return $order;

    }
}
